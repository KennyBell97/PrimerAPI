<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        return response()->json(Alumno::all());
    }

    public function show($id)
{
    $alumno = Alumno::find($id);

    if (!$alumno) {
        return response()->json(['message' => 'Alumno no encontrado'], 404);
    }

    return response()->json($alumno);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:32',
        'telefono' => 'nullable|string|max:16',
        'edad' => 'nullable|integer',
        'password' => 'required|string|min:8',
        'email' => 'required|email|unique:alumnos,email',
        'genero' => 'nullable|string|max:1',
    ]);

    $alumno = Alumno::create($validated);

    return response()->json($alumno, 201);
}

public function update(Request $request, $id)
{
    $alumno = Alumno::find($id);

    if (empty($request->all())) {
        return response()->json(['message' => 'No data found for update'], 400);
    }

    if (!$alumno) {
        return response()->json(['message' => 'Alumno not found'], 404);
    }

    $validated = $request->validate([
        'nombre' => 'required|string|max:32',
        'telefono' => 'nullable|string|max:16',
        'edad' => 'nullable|integer',
        'password' => 'nullable|string|min:8',  // Contraseña es opcional en la actualización
        'email' => 'required|email|unique:alumnos,email,' . $id,
        'genero' => 'nullable|string|max:1',
    ]);

    $alumno->update($validated);

    return response()->json($alumno);
}

public function delete($id)
{
    $alumno = Alumno::find($id);

    if (!$alumno) {
        return response()->json(['message' => 'Alumno no encontrado'], 404);
    }

    $alumno->delete();

    return response()->json(['message' => 'Alumno eliminado']);
}

}
