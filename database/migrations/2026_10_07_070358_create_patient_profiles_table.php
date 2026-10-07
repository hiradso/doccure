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
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->unique()->constrained()->cascadeOnDelete();
            $table->char("national_code", 10)->nullable()->unique();
            $table->date("birth_date")->nullable();
            $table->enum("gender", ["male", "female"])->nullable();
            $table->string("insurance")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
};
