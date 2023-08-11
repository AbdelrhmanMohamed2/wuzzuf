<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:200',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone,' . auth()->id()],
            'password' => 'nullable|string|min:8|max:200|confirmed',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg',
            'cv_file' => 'nullable|file|mimes:doc,docx,pdf',
        ];
    }
}
