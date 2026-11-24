@extends('layouts.app')

@section('titulo', 'Registrar paciente')

@section('contenido')

    <h2>Registrar paciente</h2>

    <p>Complete los datos para registrar un nuevo paciente.</p>

    <form action="{{ route('pacientes.store') }}" method="POST" novalidate>
        @csrf

        <label for="dni">DNI</label>
        <input
            type="text"
            id="dni"
            name="dni"
            maxlength="8"
            value="{{ old('dni') }}"
            required
        >
        @error('dni')
            <small>{{ $message }}</small>
        @enderror

        <label for="nombres">Nombres</label>
        <input
            type="text"
            id="nombres"
            name="nombres"
            maxlength="80"
            value="{{ old('nombres') }}"
            required
        >
        @error('nombres')
            <small>{{ $message }}</small>
        @enderror

        <label for="apellidos">Apellidos</label>
        <input
            type="text"
            id="apellidos"
            name="apellidos"
            maxlength="80"
            value="{{ old('apellidos') }}"
            required
        >
        @error('apellidos')
            <small>{{ $message }}</small>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input
            type="date"
            id="fecha_nacimiento"
            name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento') }}"
            required
        >
        @error('fecha_nacimiento')
            <small>{{ $message }}</small>
        @enderror

        <label for="sexo">Sexo</label>
        <select id="sexo" name="sexo" required>
            <option value="">Seleccione</option>
            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>
        @error('sexo')
            <small>{{ $message }}</small>
        @enderror

        <label for="telefono">Teléfono</label>
        <input
            type="text"
            id="telefono"
            name="telefono"
            maxlength="9"
            value="{{ old('telefono') }}"
        >
        @error('telefono')
            <small>{{ $message }}</small>
        @enderror

        <label for="direccion">Dirección</label>
        <input
            type="text"
            id="direccion"
            name="direccion"
            maxlength="150"
            value="{{ old('direccion') }}"
        >
        @error('direccion')
            <small>{{ $message }}</small>
        @enderror

        <button type="submit">Guardar paciente</button>

        <a href="{{ route('pacientes.index') }}" role="button" class="secondary">
            Cancelar
        </a>
    </form>

@endsection