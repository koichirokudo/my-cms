<?php

namespace App\Domain\Inquiry\Dto;

class CreateInquiryInput
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message,
        public readonly ?string $ip = null,
        public readonly ?string $userAgent = null,
    ) {}
}
