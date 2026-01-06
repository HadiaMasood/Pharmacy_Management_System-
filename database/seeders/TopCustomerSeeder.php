<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TopCustomerSeeder extends Seeder
{
    public function run()
    {
        // 1. Ensure Main User exists and has high spend
        $mainUser = User::firstOrCreate(
            ['email' => 'hello@gmail.com'],
            [
                'name' => 'Muhammad taha Khan',
                'password' => Hash::make('password'),
            ]
        );

        // Create a large completed order for main user
        Order::firstOrCreate(
            ['user_id' => $mainUser->id, 'order_no' => 'ORD-MAIN-001'],
            [
                'total_amount' => 5000.00,
                'status' => 'completed',
                'payment_status' => 'paid',
                'shipping_address' => '123 Main St'
            ]
        );

        // 2. Ensure Competitor User exists with lower spend
        $competitor = User::firstOrCreate(
            ['email' => 'competitor@test.com'],
            ['name' => 'Competitor User', 'password' => Hash::make('password')]
        );

        // Create a smaller completed order for competitor
        Order::firstOrCreate(
            ['user_id' => $competitor->id, 'order_no' => 'ORD-COMP-001'],
            [
                'total_amount' => 1000.00,
                'status' => 'completed',
                'payment_status' => 'paid',
                'shipping_address' => '456 Side St'
            ]
        );

        $this->command->info("Data seeded!");
        $this->command->info("Winner: hello@gmail.com (Total: 5000)");
        $this->command->info("Loser: competitor@test.com (Total: 1000)");
    }
}
