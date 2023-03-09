<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|max:100',
            'content' => 'required',
            'type_id' => 'numeric',
            'cover_image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.unique' => 'Another project with this title already exists',
            'title.max:100' => 'Title is too long',
            'content.required' => 'A content is required',
            'cover_image' => 'Il file caricato deve essere un\'immagine, CANE'
        ];
    }
}