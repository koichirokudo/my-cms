<?php

namespace App\Mail;

use App\Domain\Inquiry\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class InquirySubmitted extends Mailable implements ShouldQueue
{
    use Queueable;

    public function __construct(public Inquiry $inquiry) {}

    public function build()
    {
        return $this->subject('新しいお問い合わせが届きました')
            ->view('emails.inquiry_submitted');
    }
}
