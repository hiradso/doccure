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
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->unique()->constrained()->cascadeOnDelete();
            $table->foreignId("speciality_id")->constrained()->restrictOnDelete();
            $table->string("medical_council_number", 20)->unique();
            $table->enum("gender", ['male', 'female']);
            $table->text("bio")->nullable();
            $table->unsignedTinyInteger('experience_years')->default(0);
            $table->unsignedInteger('visit_fee')->default(0);
            $table->unsignedTinyInteger("slot_minutes")->default(15);

            $table->boolean("accepts_clinic_payment")->default(true);
            $table->unsignedTinyInteger("online_booking_days")->default(14);
            $table->unsignedTinyInteger("clinic_booking_days")->default(3);
            $table->unsignedTinyInteger("clinic_payment_quota")->default(50);

            $table->enum("status", ["pending", "approved", "rejected"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_profiles');
    }
};
