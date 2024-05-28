<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
			'table_id' => 'required',
			'item' => 'required|string',
			'description' => 'max:255',
            'date' => 'required|date|before_or_equal:today',
			'quantity' => 'required',
			'price' => 'required|regex:/^\d{1,7}(\.\d{1,2})?$/',
			'establishment' => 'string',
			'category' => 'max:100',
			'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'table_id.required' => 'El ID de la tabla es obligatorio.',
            'item.required' => 'El artículo es obligatorio.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
            'date.required' => 'La fecha es obligatoria.',
            'date.before_or_equal' => 'La fecha no puede ser posterior a hoy.',
            'quantity.required' => 'La cantidad es obligatoria.',
            'price.required' => 'El precio es obligatorio.',
            'price.regex' => 'El precio debe ser un número con hasta 7 dígitos y 2 decimales separados por un punto.',
            'establishment.string' => 'El establecimiento debe ser una cadena de texto.',
            'category.max' => 'La categoría no puede tener más de 100 caracteres.',
            'type.required' => 'El tipo es obligatorio.',
        ];
    }
}
