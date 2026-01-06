<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Admin;
use App\Models\Medicine;
use App\Models\Batch;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::first();
        $medicines = Medicine::with('batches')->get();

        // Create 5 sample invoices
        for ($i = 1; $i <= 5; $i++) {
            $subtotal = 0;
            $items = [];

            // Add 2-3 items per invoice
            $itemCount = rand(2, 3);
            for ($j = 0; $j < $itemCount; $j++) {
                $medicine = $medicines->random();
                $batch = $medicine->batches->first();
                
                if (!$batch) continue;

                $quantity = rand(5, 20);
                $unitPrice = $medicine->default_price;
                $itemSubtotal = $quantity * $unitPrice;
                $subtotal += $itemSubtotal;

                $items[] = [
                    'medicine_id' => $medicine->id,
                    'batch_id' => $batch->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'discount_amount' => 0,
                    'discount_percent' => 0,
                    'subtotal' => $itemSubtotal,
                ];
            }

            $discountPercent = rand(0, 10);
            $discountAmount = ($subtotal * $discountPercent) / 100;
            $total = $subtotal - $discountAmount;

            $invoice = Invoice::create([
                'invoice_no' => 'INV-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'invoice_date' => Carbon::now()->subDays(rand(0, 30)),
                'discount_amount' => $discountAmount,
                'discount_percent' => $discountPercent,
                'subtotal' => $subtotal,
                'total' => $total,
                'created_by' => $admin->id,
            ]);

            // Add items to invoice
            foreach ($items as $item) {
                InvoiceItem::create(array_merge(['invoice_id' => $invoice->id], $item));
            }
        }
    }
}
