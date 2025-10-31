<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Blog;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Domain\Blog\Dto\CreateBlogInput;
use App\Domain\Blog\UseCase\CreateBlogUseCase;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class CreateBlogUseCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
        Carbon::setTestNow();
        parent::tearDown();
    }

    public function test_handle_sets_publishedAt_when_isPublished_true(): void
    {
        $now = Carbon::parse('2024-04-01 12:34:56');
        Carbon::setTestNow($now);

        $repo = m::mock(BlogRepositoryInterface::class);

        $input = new CreateBlogInput(
            title: 'Title',
            excerpt: 'Excerpt',
            body: 'Body',
            isPublished: true,
            publishedAt: null,
        );

        $repo->shouldReceive('create')
            ->once()
            ->with(m::on(function (CreateBlogInput $arg) use ($now) {
                // publishedAt should be set to now()
                return $arg->isPublished === true && $arg->publishedAt instanceof \DateTimeInterface && $arg->publishedAt->format('Y-m-d H:i:s') === $now->format('Y-m-d H:i:s');
            }))
            ->andReturnUsing(function () {
                return new Blog();
            });

        $uc = new CreateBlogUseCase($repo);
        $result = $uc->handle($input);

        $this->assertInstanceOf(Blog::class, $result);
        $this->assertInstanceOf(\DateTimeInterface::class, $input->publishedAt);
        $this->assertSame($now->format('Y-m-d H:i:s'), $input->publishedAt?->format('Y-m-d H:i:s'));
    }

    public function test_handle_does_not_touch_publishedAt_when_isPublished_false(): void
    {
        $repo = m::mock(BlogRepositoryInterface::class);

        $input = new CreateBlogInput(
            title: 'Title',
            excerpt: 'Excerpt',
            body: 'Body',
            isPublished: false,
            publishedAt: null,
        );

        $repo->shouldReceive('create')
            ->once()
            ->with(m::on(function (CreateBlogInput $arg) {
                return $arg->isPublished === false && $arg->publishedAt === null;
            }))
            ->andReturn(new Blog());

        $uc = new CreateBlogUseCase($repo);
        $result = $uc->handle($input);

        $this->assertInstanceOf(Blog::class, $result);
        $this->assertNull($input->publishedAt);
    }
}
