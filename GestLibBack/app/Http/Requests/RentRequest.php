<?php

namespace App\Http\Requests;

use App\Rules\AvailableBook;
use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'library_section_id' => [
                'required',
                'exists:library_sections,id',
                new AvailableBook($this->input('library_section_id')),
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El campo usuario es obligatorio.',
            'user_id.exists' => 'El usuario seleccionado no existe en la base de datos.',
            'book_id.required' => 'El campo libro es obligatorio.',
            'book_id.exists' => 'El libro seleccionado no existe en la base de datos.',
        ];
    }
}
