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
        Schema::create('school_choices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("candidate_index")->unique();
            $table->enum("candidate_gender",["male","female"])->nullable();
            $table->json("choices")->nullable();
            $table->boolean("is_confirmed")->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_choices');
    }
};
