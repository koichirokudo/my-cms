<?php

namespace App\Domain\Blog\UseCase;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;

class ShowBlogUseCase
{
    public function __construct(private BlogRepositoryInterface $blogs) {}

    public function handle(int $id): ?Blog
    {
        return $this->blogs->findById($id);
    }
}
