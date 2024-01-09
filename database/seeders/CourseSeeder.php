<?php

namespace Database\Seeders;

use App\Models\College;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collegeIdCAFF = College::where('code', 'CAFF')->firstOrFail()->id;
        $collegeIdCAS = College::where('code', 'CAS')->firstOrFail()->id;
        $collegeIdCBA = College::where('code', 'CBA')->firstOrFail()->id;
        $collegeIdCCJE = College::where('code', 'CCJE')->firstOrFail()->id;
        $collegeIdCEA = College::where('code', 'CEA')->firstOrFail()->id;
        $collegeIdCIT = College::where('code', 'CIT')->firstOrFail()->id;
        $collegeIdCPAHS = College::where('code', 'CPAHS')->firstOrFail()->id;
        $collegeIdCTE = College::where('code', 'CTE')->firstOrFail()->id;

        // CAFF Courses
        Course::create(['college_id' => $collegeIdCAFF, 'description' => 'BACHELOR OF SCIENCE IN AGRICULTURAL TECHNOLOGY Major in Animal Husbandry', 'code' => 'BSAgriTech-AH']);
        Course::create(['college_id' => $collegeIdCAFF, 'description' => 'BACHELOR OF SCIENCE IN AGRICULTURE Major in Animal Science', 'code' => 'BSAgri-AS']);
        Course::create(['college_id' => $collegeIdCAFF, 'description' => 'BACHELOR OF SCIENCE IN AGRICULTURE Major in Agribusiness', 'code' => 'BSAgri-Agribiz']);
        Course::create(['college_id' => $collegeIdCAFF, 'description' => 'BACHELOR OF SCIENCE IN AGRICULTURE Major in Agronomy', 'code' => 'BSAgri-Agronomy']);
        Course::create(['college_id' => $collegeIdCAFF, 'description' => 'BACHELOR OF SCIENCE IN FISHERIES', 'code' => 'BSFisheries']);
        Course::create(['college_id' => $collegeIdCAFF, 'description' => 'BACHELOR OF SCIENCE IN FORESTRY', 'code' => 'BSForestry']);
        
        // CAS Courses
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF ARTS Major in General Curriculum', 'code' => 'BA-GC']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF ARTS Major in Social Science', 'code' => 'BA-SocialSci']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF MASS COMMUNICATION', 'code' => 'BAMC']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN BIOLOGY', 'code' => 'BSBio']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN CHEMISTRY', 'code' => 'BSChem']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', 'code' => 'BSCS']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'code' => 'BSInT']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN MATHEMATICS', 'code' => 'BSMath']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN PSYCHOLOGY', 'code' => 'BSPsych']);
        Course::create(['college_id' => $collegeIdCAS, 'description' => 'BACHELOR OF SCIENCE IN SOCIAL SCIENCE', 'code' => 'BSSocialSci']);

        // CBA Courses
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN ACCOUNTANCY', 'code' => 'BSAccountancy']);
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Financial Management', 'code' => 'BSBA-FM']);
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Human Resource Management', 'code' => 'BSBA-HRM']);
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Marketing Management', 'code' => 'BSBA-MM']);
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN HOSPITALITY MANAGEMENT', 'code' => 'BSHM']);
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN OFFICE ADMINISTRATION', 'code' => 'BSOA']);
        Course::create(['college_id' => $collegeIdCBA, 'description' => 'BACHELOR OF SCIENCE IN TOURISM MANAGEMENT', 'code' => 'BSTM']);

        // CCJE Courses
        Course::create(['college_id' => $collegeIdCCJE, 'description' => 'BACHELOR OF SCIENCE IN CRIMINOLOGY (Revised)', 'code' => 'BSCrim-Revised']);

        // CEA Courses
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN ARCHITECTURE', 'code' => 'BSARCH']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', 'code' => 'BSCE']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN COMPUTER ENGINEERING', 'code' => 'BSCOE']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', 'code' => 'BSEE']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING', 'code' => 'BSECE']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN GEODETIC ENGINEERING', 'code' => 'BSGE']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN AVIATION MAINTENANCE Major in Airframe and Maintenance', 'code' => 'BSAM-AM']);
        Course::create(['college_id' => $collegeIdCEA, 'description' => 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Avionics (Aviation Electronics)', 'code' => 'BSBA-Avionics']);

        // CIT Courses
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Architectural Drafting Technology', 'code' => 'BSIT-ADT']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Automotive Technology', 'code' => 'BSIT-AutoTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Civil Technology', 'code' => 'BSIT-CivilTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Computer Technology', 'code' => 'BSIT-CompTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Electrical Technology', 'code' => 'BSIT-ElecTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Food Technology', 'code' => 'BSIT-FoodTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Garments Technology', 'code' => 'BSIT-GarmentsTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Mechanical Technology', 'code' => 'BSIT-MechTech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Refrigeration and Airconditioning Technology', 'code' => 'BSIT-RATech']);
        Course::create(['college_id' => $collegeIdCIT, 'description' => 'BACHELOR OF TECHNOLOGICAL TECHNOLOGY Major in Computer Technology', 'code' => 'BTT-CompTech']);

        // CPAHS Courses
        Course::create(['college_id' => $collegeIdCPAHS, 'description' => 'ASSOCIATE IN MEDICAL-DENTAL-NURSING ASSISTANT', 'code' => 'AMNA']);
        Course::create(['college_id' => $collegeIdCPAHS, 'description' => 'MIDWIFERY', 'code' => 'MID']);
        Course::create(['college_id' => $collegeIdCPAHS, 'description' => 'BACHELOR OF SCIENCE IN NURSING', 'code' => 'BSN']);
        Course::create(['college_id' => $collegeIdCPAHS, 'description' => 'BACHELOR OF SCIENCE IN PHARMACY', 'code' => 'BSP']);

        // CTE Courses
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF CULTURE & ARTS EDUCATION', 'code' => 'BCAE']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF EARLY CHILDHOOD EDUCATION', 'code' => 'BECE']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF ELEMENTARY EDUCATION Major in General Curriculum', 'code' => 'BEEd-GC']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF PHYSICAL EDUCATION', 'code' => 'BPE']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SECONDARY EDUCATION Major English', 'code' => 'BSEd-English']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Deaf and Hard-of-Hearing Learners', 'code' => 'BSNED-DHH']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Early Childhood Education', 'code' => 'BSNED-ECE']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Elementary School Teaching', 'code' => 'BSNED-EST']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization General', 'code' => 'BSNED-General']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Teaching Learners with Visual Impairment', 'code' => 'BSNED-TLVI']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Agri-Fishery Arts', 'code' => 'BTLAE-AFA']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Home Economics', 'code' => 'BTLAE-HE']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Industrial Arts', 'code' => 'BTLAE-IA']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SECONDARY EDUCATION Major in Values Education', 'code' => 'BSEd-ValuesEd']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SECONDARY EDUCATION Major in Filipino', 'code' => 'BSEd-Filipino']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SECONDARY EDUCATION Major in Mathematics', 'code' => 'BSEd-Math']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SECONDARY EDUCATION Major in Sciences', 'code' => 'BSEd-Sciences']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF SECONDARY EDUCATION Major in Social Studies', 'code' => 'BSEd-SocialStudies']);
        Course::create(['college_id' => $collegeIdCTE, 'description' => 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Information & Communication Technology', 'code' => 'BTLAE-ICT']);
    }
}
