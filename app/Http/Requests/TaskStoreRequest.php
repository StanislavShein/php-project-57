<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:tasks,name|max:255',
            'description' => 'max:255',
            'status_id' => 'required',
            'labels' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required_error'),
            'name.unique' => __('validation.unique_error_task'),
            'name.max' => __('validation.max_error'),
            'description.max' => __('validation.max_error'),
            'status_id.required' => __('validation.required_error'),
        ];
    }
}
