<?php

namespace App\Http\Requests\Location;

use App\Models\Admin\Location;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
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
                ],
                'parent_id' => [
                    'required',
                    Rule::exists('locations', 'id')->where('type', 'country')
                ],
            ]
        );
    }

    public function prepareForValidation()
    {
        $this->merge([
            'type' => 'city',
        ]);
    }

}
