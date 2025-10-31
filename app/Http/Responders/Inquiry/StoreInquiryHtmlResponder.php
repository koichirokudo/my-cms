<?php

namespace App\Http\Responders\Inquiry;

use App\Domain\Inquiry\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\In;

class StoreInquiryHtmlResponder
{
    public function __invoke(Inquiry $inquiry): RedirectResponse
    {
        return redirect()
            ->route('contact.thanks')
            ->with('status', 'お問い合わせを受け付けました。ありがとうございます。');
    }
}
