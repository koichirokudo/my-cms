<?php

namespace App\Domain\Resume\UseCase;

use App\Domain\Resume\Resume;
use App\Domain\Resume\ResumeRepositoryInterface;
use Illuminate\Support\Collection;

class ListResumesUseCase
{
    public function __construct(private ResumeRepositoryInterface $resumes)
    {
    }

    /**
     * @return Collection<int, Resume>
     */
    public function handle(int $limit = 200): Collection
    {
        return $this->resumes->listAll($limit);

    }
}
