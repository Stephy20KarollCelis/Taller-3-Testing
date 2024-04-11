<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fruta;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;



class FrutaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function lista_de_frutas()
    {
        $response = $this->get('/frutas');

        $response->assertStatus(200);
    }

    #[Test]
    public function crear_fruta()
    {
        $fruta = Fruta::factory()->make();
        
        $response = $this->post('/frutas', $fruta->toArray());

        $this->assertCount(1, Fruta::all());
        $response->assertRedirect('/frutas');
    }

    #[Test]
    public function actualizar_fruta()
    {
        $fruta = Fruta::factory()->create();

        $this->patch('/frutas/'.$fruta->id, [
            'nombre' => 'Nombre Actualizado',
            'color' => 'Color Actualizado',
            'precio' => 'Precio Actualizado'
        ]);

        $frutaActualizada = Fruta::first();

        $this->assertEquals('Nombre Actualizado', $frutaActualizada->nombre);
        $this->assertEquals('Color Actualizado', $frutaActualizada->color);
        $this->assertEquals('Precio Actualizado', $frutaActualizada->precio);
    }

    public function test_carga_pagina_de_creacion_de_frutas()
    {
        $response = $this->get('/frutas/create');
        $response->assertStatus(200);
    }

    public function test_almacenamiento_de_nueva_fruta()
    {
        $response = $this->post('/frutas', [
            'nombre' => 'Manzana',
            'color' => 'Rojo',
            'precio' => '5000',
        ]);

        $response->assertRedirect('/frutas');
        $this->assertDatabaseHas('frutas', [
            'nombre' => 'Manzana',
        ]);
    }

    public function test_actualizacion_de_fruta()
    {
        $fruta = Fruta::factory()->create();

        $response = $this->put("/frutas/{$fruta->id}", [
            'nombre' => 'Manzana Actualizada',
            'color' => 'Verde',
            'precio' => '2.05',
        ]);

        $response->assertRedirect('/frutas');
        $this->assertDatabaseHas('frutas', [
            'nombre' => 'Manzana Actualizada',
        ]);
    }
    
    public function test_lista_de_frutas_muestra_frutas()
    {
        $fruta1 = Fruta::factory()->create(['nombre' => 'Manzana']);
        $fruta2 = Fruta::factory()->create(['nombre' => 'Banana']);

        $response = $this->get('/frutas');

        $response->assertStatus(200);
        $response->assertSee($fruta1->nombre);
        $response->assertSee($fruta2->nombre);
    }

    public function test_falla_al_crear_fruta_con_datos_incompletos()
    {
        $response = $this->post('/frutas', [
            'nombre' => '', 
            'color' => 'Verde',
            'precio' => '5000',
        ]);

        $response->assertSessionHasErrors('nombre');
        $this->assertDatabaseMissing('frutas', ['color' => 'Verde']);
    }
}
