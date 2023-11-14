<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'status_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required_error'),
            'name.max' => __('validation.max_error'),
            'description.max' => __('validation.max_error'),
            'status_id.required' => __('validation.required_error'),
        ];
    }
}
