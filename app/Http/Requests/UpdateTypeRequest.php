<?php

namespace App\Http\Requests;

use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
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
            'name' => [
                'required',
                'max:100',
                Rule::unique(Type::class)->ignore($this->type['id'])
            ]
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
