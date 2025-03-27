<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:100',
            'short_description' => 'required|string|min:2',
            'full_description' => 'required|string|min:2',
            'price' => 'required|numeric|min:1|max:99999.99',
            'quantity' => 'required|integer|min:1|max:100',
            'image_path' => 'required|string|min:2|max:200',
            'image_upload' => 'sometimes|image|mimes:png,jpg,jpeg,gif,webp|max:20480',
            'category' => 'required|string|min:2|max:20',
            'status' => 'required|string|min:2|max:20',
        ];
    }
}
