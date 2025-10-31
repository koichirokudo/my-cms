<?php

namespace App\Domain\Blog;

use App\Domain\Blog\Dto\CreateBlogInput;
use Illuminate\Support\Collection;

interface BlogRepositoryInterface
{
    /**
     * @return Collection<int, Blog>
     */
    public function listRecentPublished(int $limit = 50): Collection;

    public function findById(int $id): ?Blog;

    public function create(CreateBlogInput $input): Blog;

    public function update(Blog $blog, CreateBlogInput $input): Blog;

    public function delete(Blog $blog): void;
}
