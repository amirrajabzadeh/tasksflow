<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        if (auth()->user()->role === 'worker') {
            return [
                'status' => 'required|in:pending,completed,in_progress',
            ];
        }

        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'project_id' => 'required|integer|exists:projects,id',
            'assigned_to' => 'required|integer|exists:users,id',
            'status' => 'required|in:pending,completed,in_progress',
        ];
    }
}
