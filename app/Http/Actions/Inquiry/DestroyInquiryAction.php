<?php

namespace App\Http\Actions\Inquiry;

use App\Domain\Inquiry\Inquiry;
use Illuminate\Http\RedirectResponse;

class DestroyInquiryAction
{
    public function __invoke(int $id): RedirectResponse
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete(); // ← ソフトデリート

        return back()->with('status', '削除しました');
    }
}
