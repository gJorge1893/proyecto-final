<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
			'user_id' => 'integer',
			'Name' => 'required|string',
			'Description' => 'nullable|max:255',
        ];
    }

    public function messages()
    {
        return [
            'user_id.integer' => 'El ID del usuario debe ser un número entero.',
            'Name.required' => 'El nombre es obligatorio.',
            'Name.string' => 'El nombre debe ser una cadena de texto.',
            'Description.max' => 'La descripción no puede tener más de 255 caracteres.',
        ];
    }
}
