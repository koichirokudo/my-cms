<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreInquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_and_redirects(): void
    {
        $res = $this->post(route('contact.store'), [
            'name' => 'Taro',
            'email' => 'taro@example.com',
            'message' => 'こんにちは',
        ]);

        $res->assertRedirect(route('contact.thanks'));
        $this->assertDatabaseHas('inquiries', ['email' => 'taro@example.com']);
    }
}
