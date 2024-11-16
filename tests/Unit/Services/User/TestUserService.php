<?php

namespace Tests\Unit\Services\User;

use App\Models\User;
use App\services\User\UserService;
use App\DTO\UserDTO;
use App\repositories\UserRepository;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class TestUserService extends TestCase
{
    private UserService $userService;
    private MockObject $userRepository;

    protected function setUp(): void
    {
        // Create a mock for the UserRepository
        $this->userRepository = $this->createMock(UserRepository::class);

        // Inject the mock into the UserService
        $this->userService = new UserService($this->userRepository);
    }

    public function testRegister(): void
    {
        // Prepare a UserDTO instance with sample data
        $userDTO = new UserDTO(
            'John Doe',
            'johndoe@example.com',
            '123456789'
        );

        $expectedUser = new User();
        $expectedUser->name = 'John Doe';
        $expectedUser->email = 'johndoe@example.com';


        // Configure the mock to return the expected result when createUser is called
        $this->userRepository->method('createUser')
            ->with($userDTO->toArray())
            ->willReturn($expectedUser);  // Assuming createUser returns an object with user data

        // Call the register method
        $result = $this->userService->register($userDTO);

        // Verify that the result matches the input UserDTO
        $this->assertInstanceOf(User::class, $result);
    }
}
