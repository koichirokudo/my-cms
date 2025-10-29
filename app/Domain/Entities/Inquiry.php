<?php

namespace App\Domain\Entities;

class Inquiry
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message,
    ) {}
}
