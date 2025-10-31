<?php

namespace App\Http\Actions\Resume;

use App\Domain\Resume\UseCase\ListResumesUseCase;
use Illuminate\Contracts\View\View;

class IndexResumeAction
{
    public function __construct(private ListResumesUseCase $listResumes)
    {
    }

    public function __invoke(): View
    {
        $resumes = $this->listResumes->handle();
        return view('resume.index', compact('resumes'));
    }
}
