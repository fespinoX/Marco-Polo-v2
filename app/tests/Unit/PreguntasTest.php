<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;



class PreguntasTest extends TestCase
{

     use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testRutaSeeIndex()
    {   

        $response = $this->get('/index');
        $response
            ->assertStatus(200)
            ->assertSee('Soy el index');
    }

    public function testRutaSeeRegistrarse()
    {   

        $response = $this->get('/registrarse');
        $response
            ->assertStatus(200)
            ->assertSee('Soy nuevo!');
    }

    public function testRutaSeeLogin()
    {   

        $response = $this->get('/login');
        $response
            ->assertStatus(200)
            ->assertSee('Log in');
    }

    public function testRutaPreguntas()
    {   

        $response = $this->get('/preguntas');
        $response
            ->assertStatus(200);
    }
    

    public function testVariable()
    {        
    	$this->get('/preguntas')
			->assertStatus(200)
			->assertViewHas('preguntas');
    }
}
