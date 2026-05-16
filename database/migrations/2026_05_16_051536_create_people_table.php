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
    Schema::create('people', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('surname');
        $table->string('sa_id_number', 13);
        $table->string('mobile_number');
        $table->string('email');
        $table->date('birth_date');
        $table->string('language');
        $table->string('interests');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
