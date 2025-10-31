<?php

namespace App\Http\Actions\Inquiry;

use App\Domain\Inquiry\Dto\CreateInquiryInput;
use App\Domain\Inquiry\UseCase\CreateInquiryUseCase;
use App\Http\Requests\Inquiry\StoreInquiryRequest;
use App\Http\Responders\Inquiry\StoreInquiryHtmlResponder;
use Illuminate\Http\RedirectResponse;

class StoreInquiryAction
{
    public function __construct(
        private CreateInquiryUseCase $useCase,
        private StoreInquiryHtmlResponder $responder
    ) {}

    public function __invoke(StoreInquiryRequest $request): RedirectResponse
    {
        $input = new CreateInquiryInput(
            name: $request->string('name')->toString(),
            email: $request->string('email')->toString(),
            message: $request->string('message')->toString(),
            ip: $request->ip(),
            userAgent: $request->userAgent(),
        );

        $inquiry = $this->useCase->handle($input);

        return ($this->responder)($inquiry);
    }
}
