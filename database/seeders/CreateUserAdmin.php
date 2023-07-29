<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin@mail.com',
            'password' => bcrypt('thislove')
        ]);

        $role = Role::find(1);

        $user->syncRoles($role);
    
    }
}
