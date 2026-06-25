<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'        => ['sometimes', 'required', 'string', 'max:255'],
            'description'  => ['sometimes', 'required', 'string'],
            'priority'     => ['sometimes', 'required', 'in:low,middle,high'],
            'status'       => ['sometimes', 'required', 'in:waiting,progress,done'],
            'developer_id' => ['sometimes', 'required', 'integer', 'exists:developers,id'],
            'tags'         => ['sometimes', 'required', 'array'],
            'tags.*'       => ['string'],
        ];
    }
}
