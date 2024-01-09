<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['description' => 'In Stock']);
        Status::create(['description' => 'In Use']);
        Status::create(['description' => 'Lost']);
        Status::create(['description' => 'Damaged']);
        Status::create(['description' => 'In Repair']);
        Status::create(['description' => 'Ongoing']);
        Status::create(['description' => 'Returned']);
        Status::create(['description' => 'Canceled']);
        Status::create(['description' => 'Reported']);
    }
}
