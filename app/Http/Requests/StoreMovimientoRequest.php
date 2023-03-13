<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimientoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'concepto' => 'required||string|min:3|max:255',
            'cantidad' => 'required|decimal:0,2',
        ];
    }

    public function messages()
{
    return [
        'concepto.required' => 'El :attribute es obligatorio.',
        'concepto.max' =>'El :attribute no puede ser mayor a 255 caracteres.',
        'concepto.min' =>'El :attribute no puede ser menor de 3 caracteres.',
        'cantidad.required' => 'La :attribute es obligatoria.',
        'cantidad.decimal' => 'La :attribute debe contener dos decimales.',
        
        
    ];
}
}
