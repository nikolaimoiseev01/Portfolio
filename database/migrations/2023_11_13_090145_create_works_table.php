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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('order')->nullable();
            $table->string('title')->nullable();
            $table->string('desc_card')->nullable();
            $table->text('desc_full')->nullable();
            $table->text('text_detailed_1')->nullable();
            $table->text('text_detailed_2')->nullable();
            $table->string('title_en')->nullable();
            $table->string('desc_card_en')->nullable();
            $table->text('desc_full_en')->nullable();
            $table->text('text_detailed_1_en')->nullable();
            $table->text('text_detailed_2_en')->nullable();
            $table->string('link')->nullable();
            $table->json('stacks')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
