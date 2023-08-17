<?php

namespace App\Http\Requests\Post;

use App\Models\Admin\Post;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        return array_merge(Post::roles(), [
            'title' => 'required|string|min:3|max:200|unique:posts,title',
            'image' => 'required|file|image|mimes:jpeg,png,jpg',
            'admin_id' => 'required|exists:admins,id',
        ]);
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'admin_id' => auth()->user()->admin->id,
        ]);
    }
}
