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
        if (!Schema::hasTable('vagas')) {
            Schema::create('vagas', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->string('location');
                $table->string('company');
                $table->boolean('is_closed')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
