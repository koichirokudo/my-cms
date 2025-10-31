<?php

namespace App\Http\Actions\Blog;

use Illuminate\Contracts\View\View;

class CreateBlogAction
{
    public function __invoke(): View
    {
        return view('blog.store');
    }
}
