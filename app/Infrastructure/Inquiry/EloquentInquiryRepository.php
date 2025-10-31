<?php

namespace App\Infrastructure\Inquiry;

use App\Domain\Inquiry\Dto\CreateInquiryInput;
use App\Domain\Inquiry\Inquiry;
use App\Domain\Inquiry\InquiryRepositoryInterface;

class EloquentInquiryRepository implements InquiryRepositoryInterface
{
    public function create(CreateInquiryInput $input): Inquiry
    {
        return Inquiry::create([
            'name'    => $input->name,
            'email'   => $input->email,
            'message' => $input->message,
        ]);
    }
}
