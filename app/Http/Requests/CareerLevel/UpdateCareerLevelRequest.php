<?php

namespace App\Http\Requests\CareerLevel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerLevelRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:200|unique:career_levels,name,' . $this->careerLevel->id ,
        ];
    }
}
