<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Remove existing users
		DB::table('users')->delete();

		// Add default user
		DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('password'),
		]);
    }
}
