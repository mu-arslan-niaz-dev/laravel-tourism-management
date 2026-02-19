<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('action_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('path_pattern');
            $table->string('http_method', 10);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('action_codes');
    }
};
