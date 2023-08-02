<?php

namespace App\Http\Requests\Setting;

use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
        return Setting::ROLES(Route::current()->parameter('type'));
    }
}
