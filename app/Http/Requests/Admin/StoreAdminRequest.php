<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
        return array_merge(User::ROLES, [
            'email' => 'required|email|unique:users,email',
            'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone'],
            'password' => 'required|string|min:8|max:200|confirmed',
        ]);
    }
}
