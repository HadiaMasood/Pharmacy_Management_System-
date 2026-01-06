<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'name' => 'Global Pharma Ltd',
                'email' => 'contact@globalpharma.com',
                'phone' => '+1-800-123-4567',
                'address' => '123 Medical Street, New York, NY 10001',
            ],
            [
                'name' => 'MediCare Supplies',
                'email' => 'info@medicaresupplies.com',
                'phone' => '+1-800-234-5678',
                'address' => '456 Health Avenue, Los Angeles, CA 90001',
            ],
            [
                'name' => 'HealthFirst Distribution',
                'email' => 'sales@healthfirst.com',
                'phone' => '+1-800-345-6789',
                'address' => '789 Wellness Road, Chicago, IL 60601',
            ],
            [
                'name' => 'Pharma Solutions Inc',
                'email' => 'support@pharmasolutions.com',
                'phone' => '+1-800-456-7890',
                'address' => '321 Drug Lane, Houston, TX 77001',
            ],
            [
                'name' => 'Medical Imports Co',
                'email' => 'orders@medicalimports.com',
                'phone' => '+1-800-567-8901',
                'address' => '654 Remedy Street, Phoenix, AZ 85001',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::firstOrCreate(
                ['email' => $supplier['email']],
                $supplier
            );
        }
    }
}
