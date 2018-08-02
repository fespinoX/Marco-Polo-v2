<?php

use Illuminate\Database\Seeder;
use App\Models\Comentarios;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comentarios::create([
			'comentario' => 'Che, me sumo al viaje!',
			'id_pregunta'=> 1,
			'id_user'=> 5,
		]);
		Comentarios::create([
			'comentario' => 'Hablá bien, gil!',
			'id_pregunta'=> 4,
			'id_user'=> 6,	
		]);
		Comentarios::create([
			'comentario' => 'Yo te voy a dar tu problemita!',
			'id_pregunta'=> 8,
			'id_user'=> 7,
		]);
    }
}
