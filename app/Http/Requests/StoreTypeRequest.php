<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:types|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A title is required',
            'name.unique' => 'Another project with this title already exists',
            'name.max:100' => 'Title is too long',
        ];
    }
}
