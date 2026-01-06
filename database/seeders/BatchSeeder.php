<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BatchSeeder extends Seeder
{
    public function run()
    {
        $medicines = Medicine::all();
        $suppliers = Supplier::all();

        foreach ($medicines as $medicine) {
            Batch::firstOrCreate(
                [
                    'medicine_id' => $medicine->id,
                    'batch_no' => 'BATCH-' . strtoupper($medicine->sku) . '-001',
                ],
                [
                    'supplier_id' => $suppliers->random()->id,
                    'expiry_date' => Carbon::now()->addMonths(12),
                    'quantity' => 500,
                    'cost_price' => $medicine->default_price * 0.6,
                    'selling_price' => $medicine->default_price,
                ]
            );
        }
    }
}
