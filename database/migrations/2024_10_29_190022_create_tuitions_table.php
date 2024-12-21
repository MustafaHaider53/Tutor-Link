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
    Schema::create('tuitions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tutor_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        $table->foreignId('student_id')->constrained()->onDelete('cascade')->onUpdate('cascade');   
        $table->timestamps();
    });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuitions');
    }
};
