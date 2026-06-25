<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title'        => ['required', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'priority'     => ['required', 'in:low,middle,high'],
            'status'       => ['required', 'in:waiting,progress,done'],
            'developer_id' => ['required', 'integer', 'exists:developers,id'],
            'tags'         => ['required', 'array'],
            'tags.*'       => ['string'],
        ];
    }
}
