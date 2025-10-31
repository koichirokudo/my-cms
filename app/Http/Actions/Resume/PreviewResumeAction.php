<?php

namespace App\Http\Actions\Resume;

use App\Http\Requests\Resume\StoreResumeRequest;
use Illuminate\Contracts\View\View;

class PreviewResumeAction
{
    public function __invoke(StoreResumeRequest $request): View
    {
        $v = $request->validated();

        // Prepare array for preview (keep original string values for hidden inputs)
        $resume = $v;

        // For Resume, do NOT render Markdown; show plain text
        return view('resume.preview', compact('resume'));
    }
}
