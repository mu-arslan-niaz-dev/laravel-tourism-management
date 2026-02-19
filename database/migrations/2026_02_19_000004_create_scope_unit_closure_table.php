<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scope_unit_closure', function (Blueprint $table) {
            $table->unsignedBigInteger('ancestor_id');
            $table->unsignedBigInteger('descendant_id');
            $table->integer('depth');

            $table->primary(['ancestor_id', 'descendant_id']);

            $table->foreign('ancestor_id', 'fk_suc_anc')->references('id')->on('scope_units');
            $table->foreign('descendant_id', 'fk_suc_des')->references('id')->on('scope_units');

            $table->index(['descendant_id', 'ancestor_id'], 'idx_suc_desc');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scope_unit_closure');
    }
};
