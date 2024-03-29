<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
        $admin = Role::create([
            'name' => 'admin'
        ]);
        $user = Role::create([
            'name' => 'user'
        ]);
        Permission::create([
            'name' => 'delete post',
        ]);
        $admin->givePermissionTo('delete post');
    }
}
