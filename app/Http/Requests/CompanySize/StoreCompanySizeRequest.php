<?php

namespace App\Http\Requests\CompanySize;

use App\Models\Admin\CompanySize;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanySizeRequest extends FormRequest
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
        return array_merge([
        'name' => 'required|string|min:3|max:200|unique:company_sizes,name',

        ], CompanySize::ROLES);
    }
}
