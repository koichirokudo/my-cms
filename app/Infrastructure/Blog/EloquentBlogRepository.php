<?php

namespace App\Infrastructure\Blog;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Domain\Blog\Dto\CreateBlogInput;
use Illuminate\Support\Collection;

class EloquentBlogRepository implements BlogRepositoryInterface
{
    /**
     * @return Collection<int, Blog>
     */
    public function listRecentPublished(int $limit = 50): Collection
    {
        return Blog::query()
            ->recentPublished()
            ->limit($limit)
            ->get();
    }

    public function findById(int $id): ?Blog
    {
        return Blog::find($id);
    }

    public function create(CreateBlogInput $input): Blog
    {
        return Blog::create([
            'title' => $input->title,
            'excerpt' => $input->excerpt,
            'body' => $input->body,
            'is_published' => $input->isPublished,
            'published_at' => $input->publishedAt,
        ]);
    }
}
