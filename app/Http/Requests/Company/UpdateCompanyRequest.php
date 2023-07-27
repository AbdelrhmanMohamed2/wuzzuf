<?php

namespace App\Http\Requests\Company;

use App\Models\User;
use App\Models\Admin\Company;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:200|unique:companies,name,'. $this->company->id,
            'website' => ['required', 'regex:/^((http[s]?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,})(\/\S*)?$/', 'unique:companies,website,' . $this->company->id],
            'email' => 'required|email|unique:users,email,'. $this->company->user->id,
            'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone,'. $this->company->user->id],
            'password' => 'nullable|string|min:8|max:200|confirmed',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg',
        ]);
    }
}
