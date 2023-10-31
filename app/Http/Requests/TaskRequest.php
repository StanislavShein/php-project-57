<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'assigned_to_id' => 'required',
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
            'assigned_to_id' => __('validation.required_error'),
        ];
    }
}
