<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'unique:locations,name'],
            'show_at_home' => ['boolean'],
            'status' => ['boolean']
        ];
    }


    protected function prepareForValidation(): void
    {
        $this->merge([
            'show_at_home' => $this->input('show_at_home', 0),
            'status' => $this->input('status', 0)
        ]);
    }
}
