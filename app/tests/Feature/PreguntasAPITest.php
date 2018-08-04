<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PreguntasAPITest extends TestCase
{

	use RefreshDatabase;

	public function setUp()
	{
		parent::setUp();

		$this->artisan('db:seed');
	}


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Tests to check DB
     *
     * @return void
     */

    public function testReadPreguntas()
    {
        $this->assertTrue(true);
        $response = $this->json('GET', '/api/preguntas');

        $response
        	->assertStatus(200)
        	->assertJsonCount(10);
    }


    public function testReadPreguntaX()
    {
        $response = $this->json('GET', '/api/preguntas');

    	$response->assertJsonFragment([
    		'pregunta' => 'Puedo llamar a casa?'
		]);
    }


        public function testReadPreguntaXbis()
    {
    	$response = $this->json('GET', '/api/preguntas/8');

    	$response
    		->assertStatus(200)
    		->assertJson([
	    		'pregunta' => 'Hay problemas?'
			]);
    }

    public function testCreatePregunta()
    {
    	$response = $this->json('POST', '/api/preguntas', [
    		'pregunta' => 'Esto anda?',
    		'respondida' => 1,
    		'respuesta' => 'Ouuuiea',
    		'id_categoria' => 1,
    		'id' => 3
		]);

		$response
			->assertStatus(200)
			->assertJson(['success' => true]);
    }

    public function testCreateNull()
    {
    	$response = $this->json('POST', '/api/preguntas', [
    		'pregunta' => NULL,
    		'respondida' => 1,
    		'respuesta' => 'Ouuuiea',
    		'id_categoria' => 1,
    		'id' => 3
		]);

		$response
			->assertStatus(422)
			->assertJsonValidationErrors(['pregunta']);
    }

}
