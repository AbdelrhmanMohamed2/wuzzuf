<?php

namespace App\Http\Requests\JobCategory;

use App\Models\Admin\JobCategory;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobCategoryRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:200|unique:job_categories,name',

        ], JobCategory::ROLES);
    }
}
