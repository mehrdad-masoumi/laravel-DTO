<?php

namespace App\services\User;

use App\DTO\UserDTO;
use App\Models\User;
use App\repositories\UserRepository;

class UserService
{

    public UserRepository $repo;

    public function __construct(UserRepository $userRepository)
    {
        $this->repo = $userRepository;
    }

    public function register(UserDTO $DTO): User
    {
        $user = $this->repo->createUser($DTO->toArray());

        return $user;
    }

}
