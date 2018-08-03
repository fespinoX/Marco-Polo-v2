<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;



class PreguntasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testRutas()
    {        
    	$this->get('/index')
			->assertStatus(200)
			->assertSee('Soy el index');

		$this->get('/preguntas')
			->assertStatus(200)
			->assertSee('Preguntas pendientes');
		
		$this->get('/registrarse')
			->assertStatus(200)
			->assertSee('Soy nuevo!');

		$this->get('/login')
			->assertStatus(200)
			->assertSee('Log in');
    }

    public function testVariable()
    {        
    	$this->get('/preguntas')
			->assertStatus(200)
			->assertViewHas('preguntas');
    }
}
