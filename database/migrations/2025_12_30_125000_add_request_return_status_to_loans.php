<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add 'request_return' to enum values for status
        DB::statement("ALTER TABLE `loans` MODIFY `status` ENUM('dipinjam','request_return','dikembalikan') NOT NULL DEFAULT 'dipinjam'");
    }

    public function down(): void
    {
        // Revert to original enum (note: rows with request_return will be invalid)
        DB::statement("ALTER TABLE `loans` MODIFY `status` ENUM('dipinjam','dikembalikan') NOT NULL DEFAULT 'dipinjam'");
    }
};
