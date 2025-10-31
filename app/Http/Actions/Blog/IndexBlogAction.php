<?php

namespace App\Http\Actions\Blog;

use App\Domain\Blog\UseCase\ListRecentBlogsUseCase;
use Illuminate\Contracts\View\View;

class IndexBlogAction
{
    public function __construct(private ListRecentBlogsUseCase $listRecentBlogs)
    {
    }

    public function __invoke(): View
    {
        $posts = $this->listRecentBlogs->handle();
        return view('blog.index', compact('posts'));
    }
}
