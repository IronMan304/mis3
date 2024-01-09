<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tool;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tool Type: Laptops
        $laptopType = Type::where('description', 'Laptops')->first();
        $dcType = Type::where('description', 'Desktop Computers')->first();
        $printerType = Type::where('description', 'Printers')->first();
        $monitorType = Type::where('description', 'Monitors')->first();
        $computerAccessoryType = Type::where('description', 'Computer Accessories')->first();

        $officeSupplyCategory = Category::where('description', 'Office Supplies')->first();
        // Repeat the process for other types

        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $laptopType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Dell',
            'property_number' => 'LT001',
            'barcode' => 'BCLT001',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $laptopType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'HP',
            'property_number' => 'LT002',
            'barcode' => 'BCLT002',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $laptopType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Lenovo',
            'property_number' => 'LT003',
            'barcode' => 'BCLT003',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $laptopType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Asus',
            'property_number' => 'LT004',
            'barcode' => 'BCLT004',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $laptopType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Acer',
            'property_number' => 'LT005',
            'barcode' => 'BCLT005',
        ]);

        // Tool Type: Desktop Computers
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $dcType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'HP',
            'property_number' => 'DC001',
            'barcode' => 'BCDC001',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $dcType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Dell',
            'property_number' => 'DC002',
            'barcode' => 'BCDC002',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $dcType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Lenovo',
            'property_number' => 'DC003',
            'barcode' => 'BCDC003',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $dcType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Acer',
            'property_number' => 'DC004',
            'barcode' => 'BCDC004',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $dcType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Asus',
            'property_number' => 'DC005',
            'barcode' => 'BCDC005',
        ]);

        // Tool Type: Printers
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $printerType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'HP',
            'property_number' => 'PR001',
            'barcode' => 'BCPR001',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $printerType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Epson',
            'property_number' => 'PR002',
            'barcode' => 'BCPR002',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $printerType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Canon',
            'property_number' => 'PR003',
            'barcode' => 'BCPR003',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $printerType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Brother',
            'property_number' => 'PR004',
            'barcode' => 'BCPR004',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $printerType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Xerox',
            'property_number' => 'PR005',
            'barcode' => 'BCPR005',
        ]);

        // Tool Type: Monitor
        Tool::create([
            'user_id' => 1,
            'category_id' => 2,
            'type_id' => $monitorType->id,
            'source_id' => 2,
            'status_id' => 2,
            'brand' => 'Dell',
            'property_number' => 'MN001',
            'barcode' => 'BCMN001',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 2,
            'type_id' => $monitorType->id,
            'source_id' => 2,
            'status_id' => 2,
            'brand' => 'Lenovo',
            'property_number' => 'MN002',
            'barcode' => 'BCMN002',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 2,
            'type_id' => $monitorType->id,
            'source_id' => 2,
            'status_id' => 2,
            'brand' => 'HP',
            'property_number' => 'MN003',
            'barcode' => 'BCMN003',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 2,
            'type_id' => $monitorType->id,
            'source_id' => 2,
            'status_id' => 2,
            'brand' => 'Asus',
            'property_number' => 'MN004',
            'barcode' => 'BCMN004',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 2,
            'type_id' => $monitorType->id,
            'source_id' => 2,
            'status_id' => 2,
            'brand' => 'Acer',
            'property_number' => 'MN005',
            'barcode' => 'BCMN005',
        ]);

        // Tool Type: Computer Accessories
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $computerAccessoryType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Logitech Mouse',
            'property_number' => 'CA001',
            'barcode' => 'BCCA001',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $computerAccessoryType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Microsoft Keyboard',
            'property_number' => 'CA002',
            'barcode' => 'BCCA002',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $computerAccessoryType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'Sandisk USB Drive',
            'property_number' => 'CA003',
            'barcode' => 'BCCA003',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $computerAccessoryType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'D-Link Router',
            'property_number' => 'CA004',
            'barcode' => 'BCCA004',
        ]);
        Tool::create([
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => $computerAccessoryType->id,
            'source_id' => 1,
            'status_id' => 1,
            'brand' => 'HP Webcam',
            'property_number' => 'CA005',
            'barcode' => 'BCCA005',
        ]);

         // Type: Pens
         $pensType = Type::where('description', 'Pens')->first();
         for ($i = 1; $i <= 5; $i++) {
             Tool::create([
                 'user_id' => 1,
                 'category_id' => $officeSupplyCategory->id,
                 'type_id' => $pensType->id,
                 'source_id' => 1,
                 'status_id' => 1,
                 'brand' => "Pen Brand $i",
                 'property_number' => "PEN00$i",
                 'barcode' => "BCPEN00$i",
             ]);
         }
 
         // Type: Notebooks
         $notebooksType = Type::where('description', 'Notebooks')->first();
         for ($i = 1; $i <= 5; $i++) {
             Tool::create([
                 'user_id' => 1,
                 'category_id' => $officeSupplyCategory->id,
                 'type_id' => $notebooksType->id,
                 'source_id' => 1,
                 'status_id' => 1,
                 'brand' => "Notebook Brand $i",
                 'property_number' => "NOTE00$i",
                 'barcode' => "BCNOTE00$i",
             ]);
         }
 
         // Type: Staplers
         $staplersType = Type::where('description', 'Staplers')->first();
         for ($i = 1; $i <= 5; $i++) {
             Tool::create([
                 'user_id' => 1,
                 'category_id' => $officeSupplyCategory->id,
                 'type_id' => $staplersType->id,
                 'source_id' => 1,
                 'status_id' => 1,
                 'brand' => "Stapler Brand $i",
                 'property_number' => "STAP00$i",
                 'barcode' => "BCSTAP00$i",
             ]);
         }
 
         // Type: Paper Clips
         $paperClipsType = Type::where('description', 'Paper Clips')->first();
         for ($i = 1; $i <= 5; $i++) {
             Tool::create([
                 'user_id' => 1,
                 'category_id' => $officeSupplyCategory->id,
                 'type_id' => $paperClipsType->id,
                 'source_id' => 1,
                 'status_id' => 1,
                 'brand' => "Paper Clips Brand $i",
                 'property_number' => "PCLIP00$i",
                 'barcode' => "BCPCLIP00$i",
             ]);
         }
 
         // Type: Desk Organizers
         $deskOrganizersType = Type::where('description', 'Desk Organizers')->first();
         for ($i = 1; $i <= 5; $i++) {
             Tool::create([
                 'user_id' => 1,
                 'category_id' => $officeSupplyCategory->id,
                 'type_id' => $deskOrganizersType->id,
                 'source_id' => 1,
                 'status_id' => 1,
                 'brand' => "Desk Organizer Brand $i",
                 'property_number' => "DO00$i",
                 'barcode' => "BCDO00$i",
             ]);
         }
    }
}
