<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('instructor', function (Blueprint $table) {
            DB::statement('ALTER TABLE instructors MODIFY COLUMN qualifications TEXT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instructor', function (Blueprint $table) {
            DB::statement('ALTER TABLE your_table_name MODIFY COLUMN location MULTIPOINT');
        });
    }
};
