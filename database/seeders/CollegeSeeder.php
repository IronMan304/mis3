<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PHPUnit\Event\Test\TestStubForIntersectionOfInterfacesCreated;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        College::create([
            'code' => 'CAFF',
            'description' => 'College of Agriculture and Fishery'
        ]);

        College::create([
            'code' => 'CAS',
            'description' => 'College of Arts and Sciences'
        ]);

        College::create([
            'code' => 'CBA',
            'description' => 'College of Business Administration'
        ]);

        College::create([
            'code' => 'CCJE',
            'description' => 'College of Criminal Justice Education'
        ]);

        College::create([
            'code' => 'CEA',
            'description' => 'College of Engineering and Architecture'
        ]);

        College::create([
            'code' => 'CIT',
            'description' => 'College of Industrial Technology'
        ]);

        College::create([
            'code' => 'CPAHS',
            'description' => 'College of Nursing, Pharmacy, and Allied Health Services'
        ]);

        College::create([
            'code' => 'CTE',
            'description' => 'College of Teacher Education'
        ]);

    }
}
