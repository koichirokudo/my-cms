<?php

namespace App\Domain\Blog\UseCase;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;
use Illuminate\Support\Collection;

class ListRecentBlogsUseCase
{
    public function __construct(private BlogRepositoryInterface $blogs) {}

    /**
     * @return Collection<int, Blog>
     */
    public function handle(int $limit = 50): Collection
    {
        return $this->blogs->listRecentPublished($limit);
    }
}
