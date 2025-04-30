<?php

namespace Tests\Unit;

use App\Models\Note;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteTest extends TestCase {
    use RefreshDatabase;
    
    public function test_puede_crear_nota() {
        $nota = new Note([
            'titulo' => 'Título de prueba',
            'contenido' => 'Contenido de prueba'
        ]);

        $this->assertEquals('Título de prueba', $nota->titulo);
        $this->assertEquals('Contenido de prueba', $nota->contenido);
    }

    public function test_campos_correctos_nota() {

        $nota = new Note();
        $this->assertEquals( ['titulo', 'contenido'], $nota->getFillable() );

    }

    public function test_nota_es_instancia() {
        $nota = new Note([
            'titulo' => 'Título de prueba',
            'contenido' => 'Contenido de prueba'
        ]);

        $this->assertInstanceOf(Note::class, $nota);
    }

}
