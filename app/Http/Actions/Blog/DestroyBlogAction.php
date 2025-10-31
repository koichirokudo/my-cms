<?php

namespace App\Http\Actions\Blog;

use App\Domain\Blog\BlogRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DestroyBlogAction
{
    public function __construct(private BlogRepositoryInterface $blogs)
    {
    }

    public function __invoke(int $id): RedirectResponse
    {
        $blog = $this->blogs->findById($id);
        if (!$blog) {
            throw new NotFoundHttpException('Blog not found');
        }

        $this->blogs->delete($blog);

        return redirect()->route('blog.index')->with('status', 'ブログを削除しました');
    }
}
