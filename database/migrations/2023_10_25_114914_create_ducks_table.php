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
        Schema::create('ducks', function (Blueprint $table) {
            $table->id();
            $table->string('color')->default('333');
            $table->integer('age')->default(0);
            $table->string('gender')->default(0);
            $table->integer('mass')->default(0);
            $table->integer('stomach_capacity')->default(1);
            $table->integer('stomach_fill')->default(0);
            $table->integer('stomach_empty_rate')->default(1);
            $table->integer('lay_rate')->default(0);
            $table->integer('growth_rate')->default(0);
            $table->integer('speed')->default(0);
            $table->integer('endurance')->default(0);
            $table->integer('luck')->default(0);
            $table->integer('intelligence')->default(0);
            $table->integer('strength')->default(0);
            $table->integer('feathers')->default(0);
            $table->integer('volume')->default(0);
            $table->string('demeanor');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ducks');
    }
};
