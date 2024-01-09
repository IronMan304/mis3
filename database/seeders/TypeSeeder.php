<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itEquipmentCategory = Category::where('description', 'IT Equipment')->first();
        $officeSuppliesCategory = Category::where('description', 'Office Supplies')->first();
        $labEquipmentCategory = Category::where('description', 'Lab Equipment')->first();
        $stationeryCategory = Category::where('description', 'Stationery')->first();
        $booksPublicationsCategory = Category::where('description', 'Books and Publications')->first();
        $furnitureCategory = Category::where('description', 'Furniture')->first();
        $sportsEquipmentCategory = Category::where('description', 'Sports Equipment')->first();
        $artSuppliesCategory = Category::where('description', 'Art Supplies')->first();
        $audioVisualEquipmentCategory = Category::where('description', 'Audio-Visual Equipment')->first();
        $safetyGearCategory = Category::where('description', 'Safety Gear')->first();
        $musicalInstrumentsCategory = Category::where('description', 'Musical Instruments')->first();

        Type::create([
            'category_id' => $itEquipmentCategory->id,
            'description' => 'Laptops',
        ]);
        Type::create([
            'category_id' => $itEquipmentCategory->id,
            'description' => 'Desktop Computers',
        ]);
        Type::create([
            'category_id' => $itEquipmentCategory->id,
            'description' => 'Printers',
        ]);
        Type::create([
            'category_id' => $itEquipmentCategory->id,
            'description' => 'Monitors',
        ]);
        Type::create([
            'category_id' => $itEquipmentCategory->id,
            'description' => 'Computer Accessories',
        ]);

        Type::create([
            'category_id' => $officeSuppliesCategory->id,
            'description' => 'Pens',
        ]);
        Type::create([
            'category_id' => $officeSuppliesCategory->id,
            'description' => 'Notebooks',
        ]);
        Type::create([
            'category_id' => $officeSuppliesCategory->id,
            'description' => 'Staplers',
        ]);
        Type::create([
            'category_id' => $officeSuppliesCategory->id,
            'description' => 'Paper Clips',
        ]);
        Type::create([
            'category_id' => $officeSuppliesCategory->id,
            'description' => 'Desk Organizers',
        ]);

        Type::create([
            'category_id' => $labEquipmentCategory->id,
            'description' => 'Microscopes',
        ]);
        Type::create([
            'category_id' => $labEquipmentCategory->id,
            'description' => 'Lab Glassware',
        ]);
        Type::create([
            'category_id' => $labEquipmentCategory->id,
            'description' => 'Bunsen Burners',
        ]);
        Type::create([
            'category_id' => $labEquipmentCategory->id,
            'description' => 'Centrifuges',
        ]);
        Type::create([
            'category_id' => $labEquipmentCategory->id,
            'description' => 'Test Tubes',
        ]);

        Type::create([
            'category_id' => $stationeryCategory->id,
            'description' => 'Pencils',
        ]);
        Type::create([
            'category_id' => $stationeryCategory->id,
            'description' => 'Erasers',
        ]);
        Type::create([
            'category_id' => $stationeryCategory->id,
            'description' => 'Markers',
        ]);
        Type::create([
            'category_id' => $stationeryCategory->id,
            'description' => 'Scissors',
        ]);
        Type::create([
            'category_id' => $stationeryCategory->id,
            'description' => 'Glue Sticks',
        ]);

        Type::create([
            'category_id' => $booksPublicationsCategory->id,
            'description' => 'Textbooks',
        ]);
        Type::create([
            'category_id' => $booksPublicationsCategory->id,
            'description' => 'Journals',
        ]);
        Type::create([
            'category_id' => $booksPublicationsCategory->id,
            'description' => 'Magazines',
        ]);
        Type::create([
            'category_id' => $booksPublicationsCategory->id,
            'description' => 'Newspapers',
        ]);
        Type::create([
            'category_id' => $booksPublicationsCategory->id,
            'description' => 'Reference Books',
        ]);

        Type::create([
            'category_id' => $furnitureCategory->id,
            'description' => 'Office Chairs',
        ]);
        Type::create([
            'category_id' => $furnitureCategory->id,
            'description' => 'Desks',
        ]);
        Type::create([
            'category_id' => $furnitureCategory->id,
            'description' => 'Bookshelves',
        ]);
        Type::create([
            'category_id' => $furnitureCategory->id,
            'description' => 'File Cabinets',
        ]);
        Type::create([
            'category_id' => $furnitureCategory->id,
            'description' => 'Meeting Tables',
        ]);

        Type::create([
            'category_id' => $sportsEquipmentCategory->id,
            'description' => 'Soccer Balls',
        ]);
        Type::create([
            'category_id' => $sportsEquipmentCategory->id,
            'description' => 'Basketballs',
        ]);
        Type::create([
            'category_id' => $sportsEquipmentCategory->id,
            'description' => 'Tennis Rackets',
        ]);
        Type::create([
            'category_id' => $sportsEquipmentCategory->id,
            'description' => 'Yoga Mats',
        ]);
        Type::create([
            'category_id' => $sportsEquipmentCategory->id,
            'description' => 'Dumbbells',
        ]);

        Type::create([
            'category_id' => $artSuppliesCategory->id,
            'description' => 'Paint Brushes',
        ]);
        Type::create([
            'category_id' => $artSuppliesCategory->id,
            'description' => 'Sketch Pads',
        ]);
        Type::create([
            'category_id' => $artSuppliesCategory->id,
            'description' => 'Watercolor Sets',
        ]);
        Type::create([
            'category_id' => $artSuppliesCategory->id,
            'description' => 'Oil Pastels',
        ]);
        Type::create([
            'category_id' => $artSuppliesCategory->id,
            'description' => 'Canvas Boards',
        ]);

        Type::create([
            'category_id' => $audioVisualEquipmentCategory->id,
            'description' => 'Projectors',
        ]);
        Type::create([
            'category_id' => $audioVisualEquipmentCategory->id,
            'description' => 'Speakers',
        ]);
        Type::create([
            'category_id' => $audioVisualEquipmentCategory->id,
            'description' => 'Microphones',
        ]);
        Type::create([
            'category_id' => $audioVisualEquipmentCategory->id,
            'description' => 'Webcams',
        ]);
        Type::create([
            'category_id' => $audioVisualEquipmentCategory->id,
            'description' => 'Headphones',
        ]);

        Type::create([
            'category_id' => $safetyGearCategory->id,
            'description' => 'Safety Goggles',
        ]);
        Type::create([
            'category_id' => $safetyGearCategory->id,
            'description' => 'Hard Hats',
        ]);
        Type::create([
            'category_id' => $safetyGearCategory->id,
            'description' => 'Gloves',
        ]);
        Type::create([
            'category_id' => $safetyGearCategory->id,
            'description' => 'First Aid Kits',
        ]);
        Type::create([
            'category_id' => $safetyGearCategory->id,
            'description' => 'Reflective Vests',
        ]);

        Type::create([
            'category_id' => $musicalInstrumentsCategory->id,
            'description' => 'Guitars',
        ]);
        Type::create([
            'category_id' => $musicalInstrumentsCategory->id,
            'description' => 'Keyboards',
        ]);
        Type::create([
            'category_id' => $musicalInstrumentsCategory->id,
            'description' => 'Violins',
        ]);
        Type::create([
            'category_id' => $musicalInstrumentsCategory->id,
            'description' => 'Drums',
        ]);
        Type::create([
            'category_id' => $musicalInstrumentsCategory->id,
            'description' => 'Flutes',
        ]);
    }
}
