<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $pacientes = Paciente::where('dni', 'like', "%{$buscar}%")
            ->orWhere('nombres', 'like', "%{$buscar}%")
            ->orWhere('apellidos', 'like', "%{$buscar}%")
            ->orderBy('apellidos')
            ->paginate(10)
            ->withQueryString();

        return view('pacientes.index', compact('pacientes', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacienteRequest $request)
    {
        Paciente::create($request->validated());

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        $paciente->load([
            'citas' => function ($query) {
                $query->with('personalMedico')
                    ->orderByDesc('fecha_hora')
                    ->limit(5);
            }
        ]);

        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->validated());

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        if ($paciente->citas()->exists()) {
            return redirect()
                ->route('pacientes.index')
                ->with('error', 'No se puede eliminar el paciente porque tiene citas registradas.');
        }

        $paciente->delete();

        return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente.');
    }
}