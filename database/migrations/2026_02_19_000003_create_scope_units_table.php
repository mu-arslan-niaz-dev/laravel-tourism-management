<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scope_units', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('unit_type', 50);
            $table->string('name', 190);

            $table->foreign('parent_id', 'fk_su_parent')->references('id')->on('scope_units');
            $table->index('project_id', 'idx_su_project');
            $table->index('parent_id', 'idx_su_parent');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scope_units');
    }
};
