<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'university' => 'required|string|min:3|max:255',
            'field' => 'required|string|min:3|max:255',
            'degree_id' => 'required|exists:degrees,id',
            'grade_id' => 'required|exists:grades,id',
        ];
    }
}
