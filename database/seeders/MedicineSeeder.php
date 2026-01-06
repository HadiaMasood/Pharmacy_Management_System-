<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicines = [
            [
                'name' => 'Aspirin',
                'description' => 'Pain reliever and fever reducer',
                'default_price' => 5.99,
                'sku' => 'ASP001',
                'category' => 'Pain Relief',
                'unit' => 'tablet',
                'reorder_level' => 50,
            ],
            [
                'name' => 'Ibuprofen',
                'description' => 'Anti-inflammatory pain reliever',
                'default_price' => 7.99,
                'sku' => 'IBU001',
                'category' => 'Pain Relief',
                'unit' => 'tablet',
                'reorder_level' => 50,
            ],
            [
                'name' => 'Paracetamol',
                'description' => 'Fever and pain relief',
                'default_price' => 4.99,
                'sku' => 'PAR001',
                'category' => 'Pain Relief',
                'unit' => 'tablet',
                'reorder_level' => 50,
            ],
            [
                'name' => 'Amoxicillin',
                'description' => 'Antibiotic for bacterial infections',
                'default_price' => 12.99,
                'sku' => 'AMX001',
                'category' => 'Antibiotics',
                'unit' => 'capsule',
                'reorder_level' => 30,
            ],
            [
                'name' => 'Metformin',
                'description' => 'Diabetes management medication',
                'default_price' => 8.99,
                'sku' => 'MET001',
                'category' => 'Diabetes',
                'unit' => 'tablet',
                'reorder_level' => 40,
            ],
            [
                'name' => 'Lisinopril',
                'description' => 'Blood pressure medication',
                'default_price' => 9.99,
                'sku' => 'LIS001',
                'category' => 'Cardiovascular',
                'unit' => 'tablet',
                'reorder_level' => 35,
            ],
            [
                'name' => 'Atorvastatin',
                'description' => 'Cholesterol management',
                'default_price' => 11.99,
                'sku' => 'ATO001',
                'category' => 'Cardiovascular',
                'unit' => 'tablet',
                'reorder_level' => 35,
            ],
            [
                'name' => 'Omeprazole',
                'description' => 'Acid reflux treatment',
                'default_price' => 6.99,
                'sku' => 'OME001',
                'category' => 'Digestive',
                'unit' => 'capsule',
                'reorder_level' => 40,
            ],
            [
                'name' => 'Cetirizine',
                'description' => 'Allergy relief antihistamine',
                'default_price' => 5.49,
                'sku' => 'CET001',
                'category' => 'Allergy',
                'unit' => 'tablet',
                'reorder_level' => 45,
            ],
            [
                'name' => 'Vitamin D3',
                'description' => 'Vitamin D supplement',
                'default_price' => 8.49,
                'sku' => 'VIT001',
                'category' => 'Vitamins',
                'unit' => 'tablet',
                'reorder_level' => 50,
            ],
        ];

        foreach ($medicines as $medicine) {
            Medicine::firstOrCreate(
                ['sku' => $medicine['sku']],
                $medicine
            );
        }
    }
}
