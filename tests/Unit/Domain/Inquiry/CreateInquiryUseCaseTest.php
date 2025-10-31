<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Inquiry;

use App\Domain\Inquiry\Dto\CreateInquiryInput;
use App\Domain\Inquiry\Inquiry;
use App\Domain\Inquiry\InquiryRepositoryInterface;
use App\Domain\Inquiry\UseCase\CreateInquiryUseCase;
use App\Mail\InquirySubmitted;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Mockery as m;
use Tests\TestCase;

class CreateInquiryUseCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function test_handle_creates_inquiry_and_queues_mail_to_admin(): void
    {
        Mail::fake();
        Config::set('mail.admin_address', 'admin@example.com');

        $repo = m::mock(InquiryRepositoryInterface::class);

        $input = new CreateInquiryInput(
            name: 'Taro',
            email: 'taro@example.com',
            message: 'Hello'
        );

        $created = new Inquiry();
        $created->name = $input->name;
        $created->email = $input->email;
        $created->message = $input->message;

        $repo->shouldReceive('create')
            ->once()
            ->with($input)
            ->andReturn($created);

        $uc = new CreateInquiryUseCase($repo);
        $result = $uc->handle($input);

        $this->assertSame($created, $result);

        Mail::assertQueued(InquirySubmitted::class, function (InquirySubmitted $mailable) use ($created) {
            // The mailable should carry the created inquiry
            return $mailable->inquiry === $created;
        });
    }
}
