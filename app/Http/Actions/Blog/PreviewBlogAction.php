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
        $body_html = Str::markdown($body);

        return view('blog.preview', compact('title', 'excerpt', 'body', 'body_html'));
    }
}
