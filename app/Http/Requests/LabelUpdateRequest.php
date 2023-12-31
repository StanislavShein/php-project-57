<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabelUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => "required|unique:labels,name,{$this->label->id}|max:255",
            'description' => 'max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required_error'),
            'name.unique' => __('validation.unique_error_label'),
            'name.max' => __('validation.max_error'),
            'description.max' => __('validation.max_error'),
        ];
    }
}
