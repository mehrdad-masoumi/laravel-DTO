<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\RegisterRequest;
use App\services\User\UserService;

class UserController extends Controller
{

    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function userRegister(RegisterRequest $request)
    {
        $dto = new UserDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        $user = $this->userService->register($dto);

        return response()->json($user);
    }
}
