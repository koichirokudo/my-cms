<?php

namespace App\Http\Requests\Resume;

use Illuminate\Foundation\Http\FormRequest;

class StoreResumeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user();
    }

    public function rules(): array
    {
        return [
            'project_name' => ['required', 'string', 'max:255'],
            'period_from'  => ['required', 'date'],
            'period_to'    => ['nullable', 'date', 'after_or_equal:period_from'],
            'description'  => ['required', 'string'],
            'team'         => ['nullable', 'string', 'max:255'],
            'industry'     => ['nullable', 'string', 'max:100'],
            'employment'   => ['nullable', 'string', 'max:100'],
            'language_fw'  => ['nullable', 'string', 'max:255'],
            'database'     => ['nullable', 'string', 'max:100'],
            'server_os'    => ['nullable', 'string', 'max:100'],
            'cloud_env'    => ['nullable', 'string', 'max:100'],
            'tools'        => ['nullable', 'string', 'max:255'],
            'tasks'        => ['nullable', 'array'],
            'tasks.*'      => ['string', 'max:255'],
        ];
    }
}
