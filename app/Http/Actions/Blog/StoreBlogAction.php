<?php

namespace App\Http\Actions\Blog;

use App\Domain\Blog\Dto\CreateBlogInput;
use App\Domain\Blog\UseCase\CreateBlogUseCase;
use App\Http\Requests\Blog\StoreBlogRequest;
use Illuminate\Http\RedirectResponse;

class StoreBlogAction
{
    public function __construct(private CreateBlogUseCase $useCase)
    {
    }

    public function __invoke(StoreBlogRequest $request): RedirectResponse
    {
        $v = $request->validated();

        $input = new CreateBlogInput(
            title: $v['title'],
            excerpt: $v['excerpt'],
            body: $v['body'],
            isPublished: (bool)($v['is_published'] ?? false),
            publishedAt: isset($v['published_at']) ? new \DateTimeImmutable($v['published_at']) : null,
        );

        $blog = $this->useCase->handle($input);

        return redirect()->route('blog.show', $blog->id)
            ->with('status', 'ブログを投稿しました');
    }
}
