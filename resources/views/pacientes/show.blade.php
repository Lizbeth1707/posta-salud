@extends('layouts.app')

@section('titulo', 'Detalle del paciente')

@section('contenido')

    <h2>Detalle del paciente</h2>

    <article>
        <h3>Datos personales</h3>

        <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
        <p><strong>Nombres:</strong> {{ $paciente->nombres }}</p>
        <p><strong>Apellidos:</strong> {{ $paciente->apellidos }}</p>
        <p><strong>Fecha de nacimiento:</strong> {{ $paciente->fecha_nacimiento->format('d/m/Y') }}</p>
        <p><strong>Sexo:</strong> {{ $paciente->sexo == 'M' ? 'Masculino' : 'Femenino' }}</p>
        <p><strong>Teléfono:</strong> {{ $paciente->telefono ?? 'Sin teléfono' }}</p>
        <p><strong>Dirección:</strong> {{ $paciente->direccion ?? 'Sin dirección' }}</p>
    </article>

    <h3>Últimas citas</h3>

    @if ($paciente->citas->isEmpty())
        <article>
            Este paciente todavía no tiene citas registradas.
        </article>
    @else
        <figure>
            <table>
                <thead>
                    <tr>
                        <th>Fecha y hora</th>
                        <th>Motivo</th>
                        <th>Estado</th>
                        <th>Personal médico</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($paciente->citas as $cita)
                        <tr>
                            <td>{{ $cita->fecha_hora->format('d/m/Y H:i') }}</td>
                            <td>{{ $cita->motivo }}</td>
                            <td>{{ $cita->estado }}</td>
                            <td>{{ $cita->personalMedico?->nombres ?? 'No asignado' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </figure>
    @endif

    <a href="{{ route('pacientes.edit', $paciente) }}" role="button">
        Editar paciente
    </a>

    <a href="{{ route('pacientes.index') }}" role="button" class="secondary">
        Volver al listado
    </a>

@endsection