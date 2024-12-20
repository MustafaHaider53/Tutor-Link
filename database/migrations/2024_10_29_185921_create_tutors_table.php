<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tutors', function (Blueprint $table) {

        

        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('profile_picture', 10000)->nullable();
        $table->string('location')->nullable();
        $table->text('subjects_taught')->nullable(); // Store as JSON or serialized
        $table->text('availability_days')->nullable(); // Store as JSON or serialized
        $table->text('hourly_rate')->nullable(); // Store as JSON or serialized
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
