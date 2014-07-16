<?php 

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		User::create([
			'email'		=> 'jeancesargarcia@gmail.com',
			'username'	=> 'admin',
			'password'	=> Hash::make('admin')
		]);
	}
}
