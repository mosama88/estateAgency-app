<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();
        \App\Models\Project::factory(3)->create();
        \App\Models\Property::factory(5)->create();
        \App\Models\Setting::factory(1)->create();
        
        // \App\Models\Department::factory(3)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',   
        // ]);
        


        DB::table('departments')->insert([
            [
                'name' => 'Guest',
            ],
            [
                'name' => 'Finicial',
            ],
            [
                'name' => 'Managers',
            ],
            [
                'name' => 'IT',
            ],
            [
                'name' => 'HR',
            ],
            [
                'name' => 'Sales',
            ],
            // Add more static data as needed
        ]);


        DB::table('users')->insert([   

            'name' => 'Mohamed Osama',
            'email' => 'mosama88@hotmail.com',
            'phone' => '01228759920',
            'type' => 'admin',
            'department_id' => '22',
            'password' => bcrypt('password'),
        ]);



        
    }
}



