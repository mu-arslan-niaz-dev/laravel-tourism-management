<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_group_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_group_id')->constrained('user_groups')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['user_id', 'user_group_id']);
            $table->index(['user_group_id', 'user_id'], 'idx_ugm_group');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_group_memberships');
    }
};
