<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Blog;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Domain\Blog\UseCase\ListRecentBlogsUseCase;
use Illuminate\Support\Collection;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ListRecentBlogsUseCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function test_handle_forwards_default_limit_50(): void
    {
        $repo = m::mock(BlogRepositoryInterface::class);
        $expected = new Collection([new Blog(), new Blog()]);

        $repo->shouldReceive('listRecentPublished')
            ->once()
            ->with(50)
            ->andReturn($expected);

        $uc = new ListRecentBlogsUseCase($repo);
        $result = $uc->handle();

        $this->assertSame($expected, $result);
    }

    public function test_handle_forwards_custom_limit(): void
    {
        $repo = m::mock(BlogRepositoryInterface::class);
        $expected = new Collection([new Blog()]);

        $repo->shouldReceive('listRecentPublished')
            ->once()
            ->with(10)
            ->andReturn($expected);

        $uc = new ListRecentBlogsUseCase($repo);
        $result = $uc->handle(10);

        $this->assertSame($expected, $result);
    }
}
