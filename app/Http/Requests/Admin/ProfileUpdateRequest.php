<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => ['nullable', 'image', 'max:2000'],
            'banner' => ['nullable', 'image', 'max:2000'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string' ,'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:300'],
            'web_link' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url'],
            'x_link' => ['nullable', 'url'],
            'linkedin_link' => ['nullable', 'url'],
            'whatsapp_link' => ['nullable', 'url'],
            'instagram_link' => ['nullable', 'url'],
        ];
    }
}
