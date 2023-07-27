<?php

namespace App\Http\Requests\Company;

use App\Models\Admin\Company;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
        return array_merge(User::ROLES, Company::ROLES, [
            'name' => 'required|string|min:2|max:200|unique:companies,name',
            'website' => ['required', 'regex:/^((http[s]?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,})(\/\S*)?$/', 'unique:companies,website'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:200|confirmed',
            'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone'],
            'image' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
    }
}
