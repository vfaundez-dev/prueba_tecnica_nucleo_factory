<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller {
    
    public function index() {
        try {
            
            return response()->json([
                'message' => 'Listado de notas',
                'data' => Note::all()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error listando notas',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function store(Request $request) {
        try {

            $validateData = $request->validate([
                'titulo' => 'required|string|max:255',
                'contenido' => 'sometimes|string'
            ], [
                'titulo.required' => 'El campo titulo es obligatorio',
                'titulo.string' => 'El campo titulo debe ser un texto',
                'titulo.max' => 'El campo titulo no puede tener más de 255 caracteres',
                'contenido.string' => 'El campo contenido debe ser un texto'
            ]);

            $newNote = Note::create($validateData);
            return response()->json([
                'message' => 'Nota almacenada correctamente',
                'data' => $newNote
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error validando datos',
                'error' => $e->validator->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error almacenando nota',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function show(string $id) {
        try {

            $note = Note::findOrFail($id);
            return response()->json([
                'message' => 'Nota encontrada',
                'data' => $note
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Nota no encontrada',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /* public function update(Request $request, string $id) {
        
    } */

    public function destroy(string $id) {
        try {

            $note = Note::findOrFail($id);
            $note->delete();
            return response()->json([
                'message' => 'Nota eliminada correctamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error eliminando nota',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
