<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Blog;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Domain\Blog\UseCase\ShowBlogUseCase;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ShowBlogUseCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function test_handle_returns_blog_when_found(): void
    {
        $repo = m::mock(BlogRepositoryInterface::class);
        $blog = new Blog();

        $repo->shouldReceive('findById')
            ->once()
            ->with(123)
            ->andReturn($blog);

        $uc = new ShowBlogUseCase($repo);
        $result = $uc->handle(123);

        $this->assertSame($blog, $result);
    }

    public function test_handle_returns_null_when_not_found(): void
    {
        $repo = m::mock(BlogRepositoryInterface::class);

        $repo->shouldReceive('findById')
            ->once()
            ->with(999)
            ->andReturnNull();

        $uc = new ShowBlogUseCase($repo);
        $result = $uc->handle(999);

        $this->assertNull($result);
    }
}
