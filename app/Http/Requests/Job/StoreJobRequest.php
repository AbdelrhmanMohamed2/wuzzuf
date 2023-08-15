<?php

namespace App\Http\Requests\Job;

use App\Models\Admin\Job;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
        return Job::ROLES;
        // return [];
    }

    protected function prepareForValidation(): void
    {

        $this->merge([
            'skills' => json_decode($this->skills, true),
            'languages' => json_decode($this->input('languages'), true),
            'location_id' => $this->input('area_id'),
        ]);
    }
}
