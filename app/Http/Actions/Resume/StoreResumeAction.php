<?php

namespace App\Http\Actions\Resume;

use App\Domain\Resume\Dto\CreateResumeInput;
use App\Domain\Resume\UseCase\CreateResumeUseCase;
use App\Http\Requests\Resume\StoreResumeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class StoreResumeAction
{
    public function __construct(private CreateResumeUseCase $useCase)
    {
    }

    public function __invoke(StoreResumeRequest $request): RedirectResponse
    {
        $v = $request->validated();

        $input = new CreateResumeInput(
            userId: Auth::id(),
            projectName: $v['project_name'],
            periodFrom: isset($v['period_from']) ? new \DateTimeImmutable($v['period_from']) : null,
            periodTo: isset($v['period_to']) ? new \DateTimeImmutable($v['period_to']) : null,
            description: $v['description'],
            team: $v['team'] ?? null,
            industry: $v['industry'] ?? null,
            employment: $v['employment'] ?? null,
            languageFw: $v['language_fw'] ?? null,
            database: $v['database'] ?? null,
            serverOs: $v['server_os'] ?? null,
            cloudEnv: $v['cloud_env'] ?? null,
            tools: $v['tools'] ?? null,
            tasks: $v['tasks'] ?? [],
        );

        $this->useCase->handle($input);

        return redirect()->route('resume.index')
            ->with('status', 'レジュメを登録しました');
    }
}
