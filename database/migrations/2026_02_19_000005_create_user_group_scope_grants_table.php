<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_group_scope_grants', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('scope_unit_id');
            $table->string('grant_mode', 20);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('group_id', 'fk_ugsg_group')->references('id')->on('user_groups');
            $table->foreign('scope_unit_id', 'fk_ugsg_scope')->references('id')->on('scope_units');

            $table->unique(['group_id', 'scope_unit_id', 'grant_mode'], 'uq_ugsg');
            $table->index(['group_id', 'scope_unit_id'], 'idx_ugsg_group');
            $table->index(['scope_unit_id', 'group_id'], 'idx_ugsg_scope');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_group_scope_grants');
    }
};
