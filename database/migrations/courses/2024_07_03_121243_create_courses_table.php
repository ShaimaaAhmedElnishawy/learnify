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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->unsignedDecimal('price',8,2);
            $table->unsignedDecimal('duration');
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')
            ->references('id')->on('instructors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('instructor_name');
            $table->foreign('instructor_name')
            ->references('name')->on('instructors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
            $table->dropColumn('instructor_id');
        });
    }
};
