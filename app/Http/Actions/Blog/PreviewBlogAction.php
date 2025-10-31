<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\Blog\StoreBlogRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class PreviewBlogAction
{
    public function __invoke(StoreBlogRequest $request): View
    {
        $validated = $request->validated();

        $title = $validated['title'];
        $excerpt = $validated['excerpt'];
        $body = $validated['body'];
        $is_published = (bool)($validated['is_published'] ?? false);
        $blog_id = $request->input('blog_id');
        $editing = $blog_id !== null;

        $body_html = Str::markdown($body, [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        return view('blog.preview', compact('title', 'excerpt', 'body', 'body_html', 'is_published', 'blog_id', 'editing'));
    }
}
