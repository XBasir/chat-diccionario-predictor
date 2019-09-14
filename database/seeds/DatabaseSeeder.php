<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Dictionary;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    $this->call(DictionarySeeder::class);
	    
	    DB::table('users')->delete();
	    //Create Admin Role
	    $role = ['name' => 'admin', 'display_name' => 'Administrador', 'description' => 'Todos los permisos'];
	    $role = Role::create($role);
	     //Create User Role
	    $role = ['name' => 'user', 'display_name' => 'usuario', 'description' => 'Permisos limitados'];
	    $role = Role::create($role);
	    //Create Admin User
	    $user = ['name' => 'Admin User', 'email' => 'admin@admin.com', 'password' => Hash::make('password')];
	    $user = User::create($user);
	    //Set User Role
	    $user->attachRole(1);
    }

}
