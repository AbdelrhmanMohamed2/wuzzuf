<?php

namespace App\Http\Requests\Employee;

use App\Models\User;
use App\Models\Admin\Employee;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        return array_merge(User::ROLES, Employee::ROLES, [
            'email' => 'required|email|unique:users,email,' . $this->employee->user->id,
            'password' => 'nullable|string|min:8|max:200|confirmed',
            'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone,' . $this->employee->user->id],
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg',
            'cv_file' => 'nullable|file|mimes:doc,docx,pdf',

        ]);
    }
}
