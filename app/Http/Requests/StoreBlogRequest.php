<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'array'],
            'category.*' => ['required', Rule::exists('blog_categories', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title may not be greater than 255 characters.',

            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a valid string.',

            'categories.required' => 'At least one category must be selected.',
            'categories.array' => 'The categories field must be an array.',
            'categories.*.required' => 'Each category selection is required.',
            'categories.*.exists' => 'The selected category is invalid.',
        ];
    }
}
