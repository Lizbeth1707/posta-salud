<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'dni' => ['required', 'digits:8', 'unique:pacientes,dni'],
            'nombres' => ['required', 'string', 'max:80'],
            'apellidos' => ['required', 'string', 'max:80'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
            'sexo' => ['required', 'in:M,F'],
            'telefono' => ['nullable', 'digits:9'],
            'direccion' => ['nullable', 'string', 'max:150'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.before_or_equal' => 'La fecha no puede ser futura.',
            'sexo.required' => 'Debe seleccionar el sexo.',
            'sexo.in' => 'El sexo seleccionado no es válido.',
            'telefono.digits' => 'El teléfono debe tener 9 dígitos.',
        ];
    }
}