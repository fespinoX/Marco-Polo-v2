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
			'foto' => 'img/profile/kodos.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>1
		]);
		User::create([
			'name' => 'Alf',
			'email' => 'alf@laika.com',
			'planeta' => 'Melmac',
			'foto' => 'img/profile/alf.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'E.T.',
			'email' => 'et@laika.com',
			'planeta' => 'Home',
			'foto' => 'img/profile/et.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'Yoda',
			'email' => 'yoda@laika.com',
			'planeta' => 'Dagobah',
			'foto' => 'img/profile/yoda.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'Kal-El',
			'email' => 'superman@laika.com',
			'planeta' => 'Krypton',
			'foto' => 'img/profile/superman.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);
		User::create([
			'name' => 'Spock',
			'email' => 'spock@laika.com',
			'planeta' => 'Vulcano',
			'foto' => 'img/profile/spock.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);	
		User::create([
			'name' => 'Thomas Jerome Newton',
			'email' => 'tjn@laika.com',
			'planeta' => 'Anthea',
			'foto' => 'img/profile/tjn.jpg',
			'password' => \Hash::make('1234'),
			'id_rol'=>2
		]);	

    }
}