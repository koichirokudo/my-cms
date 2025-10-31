<?php

namespace App\Domain\Blog\Dto;

class CreateBlogInput
{
    public function __construct(
        public readonly string $title,
        public readonly string $excerpt,
        public readonly string $body,
        public readonly bool $isPublished = false,
        public ?\DateTimeInterface $publishedAt = null,
    ) {}
}
