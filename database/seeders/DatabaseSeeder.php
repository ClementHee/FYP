<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(member_profileSeeder::class);
        $this->call(eventSeeder::class);
        $this->call(congregationSeeder::class);
        $this->call(rolesSeeder::class);
        $this->call(volunteertypeSeeder::class);
<<<<<<< HEAD
        
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
=======
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PermissionTableSeeder::class);
>>>>>>> 83fa7c8866df46d97e6ba3293944129fa04f10c1
    }
}
