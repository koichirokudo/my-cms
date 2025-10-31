<?php

namespace App\Http\Requests\Inquiry;

use Illuminate\Foundation\Http\FormRequest;

class StoreInquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns|max:255',
            'message' => 'required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '名前は必須項目です。',
            'name.string' => '名前は文字列である必要があります。',
            'name.max' => '名前は50文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須項目です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'email.max' => 'メールアドレスは100文字以内で入力してください。',
            'message.required' => 'お問い合わせ内容は必須項目です。',
            'message.string' => 'お問い合わせ内容は文字列である必要があります。',
            'message.max' => 'お問い合わせ内容は500文字以内で入力してください。',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'message' => 'お問い合わせ内容',
        ];
    }
}
