<?php

namespace App\Infrastructure\Resume;

use App\Domain\Resume\Dto\CreateResumeInput;
use App\Domain\Resume\Resume;
use App\Domain\Resume\ResumeRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentResumeRepository implements ResumeRepositoryInterface
{
    /**
     * @return Collection<int, Resume>
     */
    public function listAll(int $limit = 200): Collection
    {
        return Resume::query()
            ->orderByPeriod()
            ->limit($limit)
            ->get();
    }

    public function findById(int $id): ?Resume
    {
        return Resume::find($id);
    }

    public function create(CreateResumeInput $input): Resume
    {
        return Resume::create([
            'user_id'     => $input->userId,
            'project_name'=> $input->projectName,
            'period_from' => $input->periodFrom,
            'period_to'   => $input->periodTo,
            'description' => $input->description,
            'team'        => $input->team,
            'industry'    => $input->industry,
            'employment'  => $input->employment,
            'language_fw' => $input->languageFw,
            'database'    => $input->database,
            'server_os'   => $input->serverOs,
            'cloud_env'   => $input->cloudEnv,
            'tools'       => $input->tools,
            'tasks_json'  => $input->tasks,
        ]);
    }
}
