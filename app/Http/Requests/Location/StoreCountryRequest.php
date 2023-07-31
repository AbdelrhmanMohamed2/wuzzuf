<?php

namespace App\Http\Requests\Location;

use App\Models\Admin\Location;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCountryRequest extends FormRequest
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
        return array_merge(
            Location::ROLES,
            [
                'name' => [
                    'required',
                    'string',
                    Rule::unique('locations', 'name')->where('type', $this->type),
                ]
            ]
        );
    }

    public function prepareForValidation()
    {
        $this->merge([
            'type' => 'country',
        ]);
    }
}
