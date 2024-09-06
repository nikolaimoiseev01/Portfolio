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
            $table->string('order');
            $table->string('title');
            $table->string('desc_card');
            $table->text('desc_full');
            $table->text('text_detailed_1');
            $table->text('text_detailed_2');
            $table->string('title_en');
            $table->string('desc_card_en');
            $table->text('desc_full_en');
            $table->text('text_detailed_1_en');
            $table->text('text_detailed_2_en');
            $table->string('link');
            $table->json('stacks');
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
