<?php

namespace Database\Seeders;

use App\Models\Borrower;
use App\Models\College;
use App\Models\Course;
use App\Models\Sex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maleSex = Sex::where('description', 'Male')->first();
        $femaleSex = Sex::where('description', 'Female')->first();

        $casCollege = College::where('code', 'CAS')->first();
        $cteCollege = College::where('code', 'CTE')->first();

        $bsintCourse = Course::where('code', 'BSInt')->first();
        $bscsCollege = Course::where('code', 'BSCS')->first();

        $bsedSciencesCourse = Course::where('code', 'BSEd-Sciences')->first();
        $bsedSocialStudiesCourse = Course::where('code', 'BSEd-SocialStudies')->first();
        // Repeat the process for other types

        // Borrowers for BSInt (CAS College)
        Borrower::create([
            'id_number' => 202001264,
            'first_name' => 'Jerecho Rey',
            'middle_name' => 'Polot',
            'last_name' => 'Inatilleza',
            'contact_number' => '09552816592',
            'sex_id' => $maleSex->id,
            'college_id' => $casCollege->id,
            'course_id' => $bsintCourse->id,
        ]);

         Borrower::create([
            'id_number' => 202000001,
            'first_name' => 'John',
            'middle_name' => 'Doe',
            'last_name' => 'Smith',
            'contact_number' => '09551234567',
            'sex_id' => $maleSex->id,
            'college_id' => $casCollege->id,
            'course_id' => $bsintCourse->id,
        ]);

        Borrower::create([
            'id_number' => 202000002,
            'first_name' => 'Jane',
            'middle_name' => 'Smith',
            'last_name' => 'Johnson',
            'contact_number' => '09552345678',
            'sex_id' => $femaleSex->id,
            'college_id' => $casCollege->id,
            'course_id' => $bscsCollege->id,
        ]);

        Borrower::create([
            'id_number' => 202000003,
            'first_name' => 'Michael',
            'middle_name' => 'Johnson',
            'last_name' => 'Davis',
            'contact_number' => '09553456789',
            'sex_id' => $maleSex->id,
            'college_id' => $cteCollege->id,
            'course_id' => $bsedSocialStudiesCourse->id,
        ]);

        Borrower::create([
            'id_number' => 202000004,
            'first_name' => 'Emily',
            'middle_name' => 'Brown',
            'last_name' => 'Miller',
            'contact_number' => '09554567890',
            'sex_id' => $femaleSex->id,
            'college_id' => $cteCollege->id,
            'course_id' => $bsedSciencesCourse->id,
        ]);

        Borrower::create([
            'id_number' => 202000005,
            'first_name' => 'David',
            'middle_name' => 'Miller',
            'last_name' => 'Brown',
            'contact_number' => '09555678901',
            'sex_id' => $maleSex->id,
            'college_id' => $cteCollege->id,
            'course_id' => $bsedSciencesCourse->id,
        ]);
        
    }
}

