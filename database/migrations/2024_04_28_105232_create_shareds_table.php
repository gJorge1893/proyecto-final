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
        Schema::create('shareds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id')
                ->references('id')
                ->on('tables')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['table_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shareds');
    }
};
