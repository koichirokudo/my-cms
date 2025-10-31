<?php

namespace App\Domain\Inquiry;

use App\Domain\Inquiry\Dto\CreateInquiryInput;

interface InquiryRepositoryInterface
{
    public function create(CreateInquiryInput $input): Inquiry;
}
