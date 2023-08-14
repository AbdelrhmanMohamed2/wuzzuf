<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    public static function generalRules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone,' . auth()->id()],
            'password' => 'nullable|string|min:8|max:200|confirmed',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg',
        ];
    }

    public static function employeeRules()
    {
        return [
            'title' => 'required|string|min:2|max:200',
            'cv_file' => 'nullable|file|mimes:doc,docx,pdf',
        ];
    }

    public static function companyRules()
    {
        return [
            'name' => 'required|string|min:2|max:200|unique:companies,name,' . auth()->user()->company->id,
            'website' => ['required', 'regex:/^((http[s]?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,})(\/\S*)?$/', 'unique:companies,website,' . auth()->user()->company->id],
            'description' => 'required|string|min:8',
            'country_id' => 'required|exists:locations,id,type,country',
            'city_id' => 'required|exists:locations,id,type,city',
            'area_id' => 'required|exists:locations,id,type,area',
            'company_size_id' => 'required|exists:company_sizes,id',
        ];
    }
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
        return array_merge(
            (auth()->user()->IsEmployee() ? self::employeeRules() : []),
            (auth()->user()->IsCompany() ? self::companyRules() : []),
            self::generalRules()
        );
    }
}
