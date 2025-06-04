<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            // Create payment record
            Payment::create([
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'payment_method' => $this->getPaymentMethod(),
                'transaction_id' => $this->getTransactionId($order),
                'amount' => $order->total_price,
                'status' => $order->payment_status === 'paid' ? 'completed' : $order->payment_status,
                'created_at' => $order->created_at,
            ]);
        }
    }

    private function getPaymentMethod(): string
    {
        return fake()->randomElement([
            'cod',   // Cash on Delivery
            'card',  // Credit/Debit Card
            'paypal' // PayPal
        ]);
    }

    private function getTransactionId(Order $order): ?string
    {
        if ($order->payment_status === 'pending') {
            return null;
        }

        $prefix = match ($this->getPaymentMethod()) {
            'cod' => 'COD',
            'card' => 'CC',
            'paypal' => 'PP',
            default => 'TX'
        };

        return $prefix . strtoupper(fake()->bothify('##???###'));
    }
}
