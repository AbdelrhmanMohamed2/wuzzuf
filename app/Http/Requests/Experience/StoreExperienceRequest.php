<?php

namespace App\Http\Requests\Experience;

use App\Models\Admin\Experience;
use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
        return Experience::ROLES;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ? true : false,
        ]);
    }
}
