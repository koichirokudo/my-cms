<?php

namespace App\Http\Actions\Resume;

use Illuminate\Contracts\View\View;

class CreateResumeAction
{
    public function __invoke(): View
    {
        return view('resume.create');
    }
}
