<?php

namespace App\DTO;

class UserDTO
{
    public function __construct(
        public string $name,
        public string|null $email,
        public string|null $password,
    ) {}


    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toDTO(array $data): UserDTO
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        return $this;
    }

}
