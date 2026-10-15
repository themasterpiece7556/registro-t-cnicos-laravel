<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
   
    public function store(Request $request)
    {
            $validatedData = $request->validate([    
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'especialidad_tecnica' => 'required|string|max:100',
            'zona_servicio' => 'nullable|string|max:80',
            'email' => 'required|email|unique:personas,email',
            'telefono' => 'nullable|string|max:20',
            ]);
            // 2. Inserción usando Eloquent
            $persona = Persona::create($validatedData);
            // 3. Respuesta JSON estandarizada (Status 201: Created)
            return response()->json([
            'mensaje' => 'Técnico registrado exitosamente',
            'data' => $persona
            ], 201);
    }

    
    
}
