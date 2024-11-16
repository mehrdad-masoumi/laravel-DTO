<?php

namespace App\repositories;

use App\Models\User;

class UserRepository implements UserIRepository
{

    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser(array $data): User
    {
        return $this->model->create($data);
    }

    public function byID(int $userID): User
    {
        return $this->model->query()->find($userID);
    }
}
