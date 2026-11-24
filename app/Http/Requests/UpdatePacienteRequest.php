<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $paciente = $this->route('paciente');

        return [
            'dni' => [
                'required',
                'digits:8',
                Rule::unique('pacientes', 'dni')->ignore($paciente->id),
            ],
            'nombres' => ['required', 'string', 'max:80'],
            'apellidos' => ['required', 'string', 'max:80'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
            'sexo' => ['required', 'in:M,F'],
            'telefono' => ['nullable', 'regex:/^9[0-9]{8}$/'],
            'direccion' => ['nullable', 'string', 'max:150'],
        ];
    }

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
            'telefono.regex' => 'El celular debe empezar con 9 y tener 9 dígitos.',
        ];
    }
}