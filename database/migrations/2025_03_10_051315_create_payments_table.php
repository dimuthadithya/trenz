<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->enum('payment_method', ['card', 'paypal', 'cod'])->default('cod');
            $table->string('transaction_id')->unique()->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();



            //             CREATE TABLE payments (
            //     id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            //     user_id BIGINT UNSIGNED,
            //     order_id BIGINT UNSIGNED,
            //     payment_method ENUM('card', 'paypal', 'cod') DEFAULT 'cod',
            //     transaction_id VARCHAR(255) UNIQUE NULL,
            //     amount DECIMAL(10,2),
            //     status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
            //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            //     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            //     FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
            // );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
