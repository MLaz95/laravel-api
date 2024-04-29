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
        Schema::create('project_technology', function (Blueprint $table) {
            // creates project_id column and sets it as a constrained foreign key
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            // does the same for the technology_id column
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();

            // sets the pair of values as primary keys
            $table->primary(['project_id', 'technology_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
