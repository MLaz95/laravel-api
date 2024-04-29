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
        Schema::table('projects', function (Blueprint $table) {
            // adds type_id column to projects
            $table->foreignId('type_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // removes link between type_id and the types table
            $table->dropForeign('projects_type_id_foreign');

            // drops the actual column
            $table->dropColumn('type_id');
        });
    }
};
