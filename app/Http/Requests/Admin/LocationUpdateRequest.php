<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'unique:locations,name,' . $this->location],
            'show_at_home' => ['boolean'],
            'status' => ['boolean']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'show_at_home' => $this->input('show_at_home', 0),
            'status' => $this->input('status', 0)
        ]);
    }
}
