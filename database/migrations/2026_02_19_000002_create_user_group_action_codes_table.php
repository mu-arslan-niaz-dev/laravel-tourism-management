<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_group_action_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_group_id')->constrained('user_groups')->cascadeOnDelete();
            $table->foreignId('action_code_id')->constrained('action_codes')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['user_group_id', 'action_code_id']);
            $table->index(['action_code_id', 'user_group_id'], 'idx_gac_action');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_group_action_codes');
    }
};
