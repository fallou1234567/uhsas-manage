<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE members
            MODIFY status ENUM('active', 'pending', 'disabled')
            NOT NULL DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE members
            MODIFY status ENUM('active', 'pending')
            NOT NULL DEFAULT 'pending'
        ");
    }
};