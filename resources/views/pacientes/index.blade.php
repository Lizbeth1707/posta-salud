@extends('layouts.app')

@section('titulo', 'Pacientes')

@section('contenido')

    <h2>Listado de pacientes</h2>

    @if (session('success'))
        <article style="background-color: #d1e7dd; color: #0f5132;">
            {{ session('success') }}
        </article>
    @endif

    @if (session('error'))
        <article style="background-color: #f8d7da; color: #842029;">
            {{ session('error') }}
        </article>
    @endif

    <p>Administra y consulta los pacientes registrados en el sistema.</p>

    <div class="grid">
        <form action="{{ route('pacientes.index') }}" method="GET">
            <input
                type="search"
                name="buscar"
                placeholder="Buscar por DNI, nombres o apellidos"
                value="{{ $buscar }}"
            >
            <button type="submit">Buscar</button>
        </form>

        <div>
            <a href="{{ route('pacientes.create') }}" role="button">
                Registrar paciente
            </a>
        </div>
    </div>

    @if ($pacientes->isEmpty())
        <article>
            No se encontraron pacientes registrados.
        </article>
    @else
        <figure>
            <table>
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>Sexo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->dni }}</td>
                            <td>{{ $paciente->nombres }}</td>
                            <td>{{ $paciente->apellidos }}</td>
                            <td>{{ $paciente->fecha_nacimiento->format('d/m/Y') }}</td>
                            <td>{{ $paciente->sexo }}</td>
                            <td>{{ $paciente->telefono ?? 'Sin teléfono' }}</td>
                            <td>
                                <a href="{{ route('pacientes.show', $paciente) }}">Ver</a>
                                |
                                <a href="{{ route('pacientes.edit', $paciente) }}">Editar</a>
                                |
                                <form
                                    action="{{ route('pacientes.destroy', $paciente) }}"
                                    method="POST"
                                    style="display: inline;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="secondary"
                                        onclick="return confirm('¿Está seguro de eliminar este paciente?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </figure>

        {{ $pacientes->links() }}
    @endif

@endsection