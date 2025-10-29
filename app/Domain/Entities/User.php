<?php

namespace App\Domain\Entities;

class User
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {}
}
