<?php

namespace App\Domain\Resume\UseCase;

use App\Domain\Resume\Dto\CreateResumeInput;
use App\Domain\Resume\Resume;
use App\Domain\Resume\ResumeRepositoryInterface;

class CreateResumeUseCase
{
    public function __construct(private ResumeRepositoryInterface $resumes)
    {
    }

    public function handle(CreateResumeInput $input): Resume
    {
        return $this->resumes->create($input);
    }
}
