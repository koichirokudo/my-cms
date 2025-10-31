<?php

namespace App\Http\Actions\Blog;

use App\Domain\Blog\BlogRepositoryInterface;
use App\Domain\Blog\Dto\CreateBlogInput;
use App\Http\Requests\Blog\StoreBlogRequest;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateBlogAction
{
    public function __construct(private BlogRepositoryInterface $blogs)
    {
    }

    public function __invoke(StoreBlogRequest $request, int $id): RedirectResponse
    {
        $v = $request->validated();

        $blog = $this->blogs->findById($id);
        if (!$blog) {
            throw new NotFoundHttpException('Blog not found');
        }

        $input = new CreateBlogInput(
            title: $v['title'],
            excerpt: $v['excerpt'],
            body: $v['body'],
            isPublished: (bool)($v['is_published'] ?? false),
            publishedAt: isset($v['is_published']) && $v['is_published'] ? now() : null,
        );

        $this->blogs->update($blog, $input);

        return redirect()->route('blog.show', $blog->id)
            ->with('status', 'ブログを更新しました');
    }
}
