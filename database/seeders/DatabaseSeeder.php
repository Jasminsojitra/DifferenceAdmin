<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        Role::create(['name' => 'player']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> Hash::make('12345678')
        ]);

        $user->assignRole($role);
    }
}
