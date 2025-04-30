<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest {
    
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'titulo' => 'required|string|max:255',
            'contenido' => 'sometimes|string'
        ];
    }

    public function messages(): array {
        return [
            'titulo.required' => 'El campo titulo es obligatorio',
            'titulo.string' => 'El campo titulo debe ser un texto',
            'titulo.max' => 'El campo titulo no puede tener más de 255 caracteres',
            'contenido.string' => 'El campo contenido debe ser un texto'
        ];
    }
}
