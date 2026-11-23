@extends('layouts.app')

@section('titulo', 'Editar paciente')

@section('contenido')

    <h2>Editar paciente</h2>

    <p>Modifique los datos del paciente.</p>

    <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni"
            maxlength="8" value="{{ old('dni', $paciente->dni) }}" required>
        @error('dni')
            <small>{{ $message }}</small>
        @enderror

        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres"
            maxlength="80" value="{{ old('nombres', $paciente->nombres) }}" required>
        @error('nombres')
            <small>{{ $message }}</small>
        @enderror

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos"
            maxlength="80" value="{{ old('apellidos', $paciente->apellidos) }}" required>
        @error('apellidos')
            <small>{{ $message }}</small>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento->format('Y-m-d')) }}" required>
        @error('fecha_nacimiento')
            <small>{{ $message }}</small>
        @enderror

        <label for="sexo">Sexo</label>
        <select id="sexo" name="sexo" required>
            <option value="">Seleccione</option>
            <option value="M" {{ old('sexo', $paciente->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo', $paciente->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>
        @error('sexo')
            <small>{{ $message }}</small>
        @enderror

        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono"
            maxlength="9" value="{{ old('telefono', $paciente->telefono) }}">
        @error('telefono')
            <small>{{ $message }}</small>
        @enderror

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion"
            maxlength="150" value="{{ old('direccion', $paciente->direccion) }}">
        @error('direccion')
            <small>{{ $message }}</small>
        @enderror

        <button type="submit">Actualizar paciente</button>

        <a href="{{ route('pacientes.index') }}" role="button" class="secondary">
            Cancelar
        </a>
    </form>

@endsection