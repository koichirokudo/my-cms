<?php

namespace App\Http\Actions\Blog;

use App\Domain\Blog\UseCase\ShowBlogUseCase;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditBlogAction
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
        // Reuse create form (store.blade.php) with pre-filled values
        return view('blog.store', compact('blog'));
    }
}
