<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'admin@user.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');
    }
}
