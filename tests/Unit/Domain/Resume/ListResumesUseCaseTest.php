<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Resume;

use App\Domain\Resume\Resume;
use App\Domain\Resume\ResumeRepositoryInterface;
use App\Domain\Resume\UseCase\ListResumesUseCase;
use Illuminate\Support\Collection;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ListResumesUseCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function test_handle_forwards_default_limit_200(): void
    {
        $repo = m::mock(ResumeRepositoryInterface::class);
        $expected = new Collection([new Resume(), new Resume()]);

        $repo->shouldReceive('listAll')
            ->once()
            ->with(200)
            ->andReturn($expected);

        $uc = new ListResumesUseCase($repo);
        $result = $uc->handle();

        $this->assertSame($expected, $result);
    }

    public function test_handle_forwards_custom_limit(): void
    {
        $repo = m::mock(ResumeRepositoryInterface::class);
        $expected = new Collection([new Resume()]);

        $repo->shouldReceive('listAll')
            ->once()
            ->with(10)
            ->andReturn($expected);

        $uc = new ListResumesUseCase($repo);
        $result = $uc->handle(10);

        $this->assertSame($expected, $result);
    }
}
