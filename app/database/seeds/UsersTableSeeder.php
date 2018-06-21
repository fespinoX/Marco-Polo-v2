<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		User::create([
			'name' => 'Kodos',
			'email' => 'kodos@laika.com',
			'planeta' => 'Rigel VII',
			'foto' => 'imgs/kodos.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>1
		]);
		User::create([
			'name' => 'Alf',
			'email' => 'alf@laika.com',
			'planeta' => 'Melmac',
			'foto' => 'imgs/alf.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'E.T.',
			'email' => 'et@laika.com',
			'planeta' => 'Home',
			'foto' => 'imgs/et.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'Yoda',
			'email' => 'yoda@laika.com',
			'planeta' => 'Dagobah',
			'foto' => 'imgs/yoda.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'Kal-El',
			'email' => 'superman@laika.com',
			'planeta' => 'Krypton',
			'foto' => 'imgs/superman.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'Spock',
			'email' => 'spock@laika.com',
			'planeta' => 'Vulcano',
			'foto' => 'imgs/spock.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);	
		User::create([
			'name' => 'Thomas Jerome Newton',
			'email' => 'tjn@laika.com',
			'planeta' => 'Anthea',
			'foto' => 'imgs/tjn.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);	

    }
}