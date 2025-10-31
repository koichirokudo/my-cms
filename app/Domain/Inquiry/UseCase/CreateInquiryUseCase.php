<?php

namespace App\Domain\Inquiry\UseCase;

use App\Domain\Inquiry\Dto\CreateInquiryInput;
use App\Domain\Inquiry\Inquiry;
use App\Domain\Inquiry\InquiryRepositoryInterface;
use App\Mail\InquirySubmitted;
use Illuminate\Support\Facades\Mail;

class CreateInquiryUseCase
{
    public function __construct(
        private InquiryRepositoryInterface $inquiries
    ) {}

    public function handle(CreateInquiryInput $input): Inquiry
    {
        $inquiry = $this->inquiries->create($input);

        // 管理者通知（非同期推奨）
        Mail::to(config('mail.admin_address'))
            ->queue(new InquirySubmitted($inquiry));

        return $inquiry;
    }
}
