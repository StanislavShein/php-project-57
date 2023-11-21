<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStatusUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => "required|unique:task_statuses,name,{$this->task_status->id}|max:255",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required_error'),
            'name.unique' => __('validation.unique_error_status'),
            'name.max' => __('validation.max_error'),
        ];
    }
}
