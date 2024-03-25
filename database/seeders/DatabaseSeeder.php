<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $this->call([
            RoleAndPermissionSeeder::class,


            StatusSeeder::class,
            PositionSeeder::class,
            SexSeeder::class,
            HonorificSeeder::class,


            UserSeeder::class,
            BorrowerSeeder::class,
            OperatorSeeder::class,


            CategorySeeder::class,
            TypeSeeder::class,

            SourceSeeder::class,

            ToolSeeder::class,

          
            ServiceSeeder::class,

            OptionSeeder::class,
        ]);
    }
}
