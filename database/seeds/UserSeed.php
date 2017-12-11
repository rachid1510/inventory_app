<?php
use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Durand',
            'email' => 'durand@chezlui.fr',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'Dupont',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
        ]);
    }
}