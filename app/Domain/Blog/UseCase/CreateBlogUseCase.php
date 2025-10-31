<?php

namespace App\Domain\Blog\UseCase;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Domain\Blog\Dto\CreateBlogInput;

class CreateBlogUseCase
{
    public function __construct(private BlogRepositoryInterface $blogs) {}

    public function handle(CreateBlogInput $input): Blog
    {
        if ($input->isPublished) {
            $input->publishedAt = now();
        }
        return $this->blogs->create($input);
    }
}
