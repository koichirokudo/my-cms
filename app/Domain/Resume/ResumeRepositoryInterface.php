<?php

namespace App\Domain\Resume;

use App\Domain\Resume\Dto\CreateResumeInput;
use Illuminate\Support\Collection;

interface ResumeRepositoryInterface
{
    /**
     * @return Collection<int, Resume>
     */
    public function listAll(int $limit = 200): Collection;

    public function findById(int $id): ?Resume;

    public function create(CreateResumeInput $input): Resume;
}
