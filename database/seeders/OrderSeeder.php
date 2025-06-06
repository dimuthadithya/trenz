<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Get customers
        $customers = User::where('role', 'customer')->get();
        $products = Product::all();

        // Generate orders for the past 30 days
        for ($i = 30; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);

            // Generate 1-5 orders per day
            $orderCount = rand(1, 5);

            for ($j = 0; $j < $orderCount; $j++) {
                $customer = $customers->random();

                // Create or get customer address                // Get or parse customer name
                $names = explode(' ', $customer->name);
                $firstName = $customer->first_name ?? $names[0] ?? 'Customer';
                $lastName = $customer->last_name ?? $names[1] ?? fake()->lastName();

                $address = Address::firstOrCreate(
                    ['user_id' => $customer->id],
                    [
                        'fname' => $firstName,
                        'lname' => $lastName,
                        'address' => fake()->streetAddress(),
                        'city' => fake()->city(),
                        'country' => 'Sri Lanka',
                        'zip_code' => fake()->postcode(),
                        'phone_number' => fake()->phoneNumber(),
                        'email' => $customer->email,
                    ]
                );

                // Create order
                $order = Order::create([
                    'user_id' => $customer->id,
                    'addresses_id' => $address->id,
                    'order_number' => 'ORD' . $date->timestamp . rand(1000, 9999),
                    'total_price' => 0,
                    'status' => $this->getOrderStatus($i),
                    'payment_status' => $this->getPaymentStatus($i),
                    'created_at' => $date->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
                ]);

                // Add 1-5 products to order
                $orderTotal = 0;
                $orderProducts = $products->random(rand(1, 5));

                foreach ($orderProducts as $product) {
                    $quantity = rand(1, 3);
                    $price = $product->price;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $price,
                    ]);

                    $orderTotal += ($price * $quantity);
                }

                // Update order total
                $order->update(['total_price' => $orderTotal]);
            }
        }
    }

    private function getOrderStatus(int $daysAgo): string
    {
        if ($daysAgo === 0) {
            return 'processing';
        }

        if ($daysAgo <= 3) {
            return fake()->randomElement(['processing', 'shipped']);
        }

        if ($daysAgo <= 7) {
            return fake()->randomElement(['processing', 'shipped', 'delivered']);
        }

        return fake()->randomElement(['delivered', 'canceled']);
    }

    private function getPaymentStatus(int $daysAgo): string
    {
        if ($daysAgo === 0) {
            return 'pending';
        }

        if ($daysAgo <= 2) {
            return fake()->randomElement(['pending', 'paid']);
        }

        return 'paid';
    }
}
