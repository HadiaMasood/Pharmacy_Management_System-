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
                'price' => 5.99,
                'quantity' => 100,
            ],
            [
                'name' => 'Ibuprofen',
                'description' => 'Anti-inflammatory pain reliever',
                'price' => 7.99,
                'quantity' => 150,
            ],
            [
                'name' => 'Paracetamol',
                'description' => 'Fever and pain relief',
                'price' => 4.99,
                'quantity' => 200,
            ],
            [
                'name' => 'Amoxicillin',
                'description' => 'Antibiotic for bacterial infections',
                'price' => 12.99,
                'quantity' => 80,
            ],
            [
                'name' => 'Metformin',
                'description' => 'Diabetes management medication',
                'price' => 8.99,
                'quantity' => 120,
            ],
            [
                'name' => 'Lisinopril',
                'description' => 'Blood pressure medication',
                'price' => 9.99,
                'quantity' => 90,
            ],
            [
                'name' => 'Atorvastatin',
                'description' => 'Cholesterol management',
                'price' => 11.99,
                'quantity' => 110,
            ],
            [
                'name' => 'Omeprazole',
                'description' => 'Acid reflux treatment',
                'price' => 6.99,
                'quantity' => 140,
            ],
            [
                'name' => 'Cetirizine',
                'description' => 'Allergy relief antihistamine',
                'price' => 5.49,
                'quantity' => 160,
            ],
            [
                'name' => 'Vitamin D3',
                'description' => 'Vitamin D supplement',
                'price' => 8.49,
                'quantity' => 200,
            ],
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}
