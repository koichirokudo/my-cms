<?php

namespace App\Domain\Entities;

use DateTimeImmutable;

class Blog
{
    public function __construct(
        public readonly string $title,
        public readonly string $body,
        public readonly bool $isPublished = false,
        public readonly ?DateTimeImmutable $publishedAt = null,
    ) {}
}
