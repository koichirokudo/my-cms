<?php

namespace App\Http\Actions\Blog;

use App\Domain\Blog\UseCase\ShowBlogUseCase;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowBlogAction
{
    public function __construct(private ShowBlogUseCase $showBlog)
    {
    }

    public function __invoke(int $id): View
    {
        $blog = $this->showBlog->handle($id);
        if (!$blog) {
            throw new NotFoundHttpException('Blog not found');
        }

        $body = Str::markdown($blog->body ?? '');
        return view('blog.show', compact('blog', 'body'));
    }
}
