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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_number')->unique();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->date('birth_date')->nullable();

            $table->enum('gender', [
                'male',
                'female',
                'other'
            ])->nullable();

            $table->string('photo')->nullable();

            $table->foreignId('profession_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('region_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('department_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('commune_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('address')->nullable();

            $table->enum('registration_source', [
                'self',
                'agent',
                'admin'
            ])->default('self');

            $table->enum('status', [
                'pending',
                'active',
                'late',
                'expired',
                'suspended'
            ])->default('pending');

            $table->timestamp('registered_at')->nullable();

            $table->date('activated_at')->nullable();

            $table->date('membership_expires_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
