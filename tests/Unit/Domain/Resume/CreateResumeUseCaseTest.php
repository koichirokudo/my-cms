<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Resume;

use App\Domain\Resume\Dto\CreateResumeInput;
use App\Domain\Resume\Resume;
use App\Domain\Resume\ResumeRepositoryInterface;
use App\Domain\Resume\UseCase\CreateResumeUseCase;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class CreateResumeUseCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function test_handle_creates_resume_via_repository(): void
    {
        $repo = m::mock(ResumeRepositoryInterface::class);

        $input = new CreateResumeInput(
            userId: 1,
            projectName: 'Awesome Project',
        );

        $created = new Resume();
        $created->user_id = 1;
        $created->project_name = 'Awesome Project';

        $repo->shouldReceive('create')
            ->once()
            ->with($input)
            ->andReturn($created);

        $uc = new CreateResumeUseCase($repo);
        $result = $uc->handle($input);

        $this->assertSame($created, $result);
    }
}
