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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')
            ->constrained()
            ->cascadeOnDelete();

            // $table->foreignId('contribution_type_id')
            //     ->constrained()
            //     ->restrictOnDelete();

            $table->decimal('amount', 12, 2);

            $table->unsignedInteger('year');

            $table->date('paid_at');

            $table->string('payment_method')->nullable();

            $table->string('reference')->nullable();

            $table->enum('status', [
                'paid',
                'cancelled'
            ])->default('paid');

            $table->foreignId('recorded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
