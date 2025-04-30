<?php

namespace Tests\Feature;

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase {
    use RefreshDatabase;
    
    public function test_puede_listar_notas() {
        
        Note::factory()->count(3)->create();
        $response = $this->getJson(route('notes.index'));
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'message',
                    'data' => [
                        '*' => [
                            'id',
                            'titulo',
                            'contenido',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]);

    }

    public function test_puede_crear_nota() {

        $nuevaNota = [
            'titulo' => 'Nota de prueba',
            'contenido' => 'Culpa laboris cillum do ut officia eu anim deserunt labore ut veniam.'
        ];

        $response = $this->postJson( route('notes.store'), $nuevaNota );

        $response->assertStatus(201)
                ->assertJson([
                    'message' => 'Nota almacenada correctamente',
                    'data' => [
                        'titulo' => $nuevaNota['titulo'],
                        'contenido' => $nuevaNota['contenido']
                    ]
                ]);
    }

    public function test_puede_eliminar_nota() {
        $nota = Note::factory()->create();

        $response = $this->deleteJson( route('notes.destroy', $nota->id) );

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Nota eliminada correctamente'
                ]);

        $this->assertDatabaseMissing('notes', [
            'id' => $nota->id
        ]);
    }

}
