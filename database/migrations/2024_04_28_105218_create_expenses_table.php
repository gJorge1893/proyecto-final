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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id')
                ->references('id')
                ->on('tables')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('item', 100);
            $table->string('description', 255)->nullable();
            $table->date('date');
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->decimal('price', 9, 2);
            $table->string('establishment', 100)->nullable();
            $table->string('category', 100)->nullable();
            $table->enum('type', ['gasto', 'ingreso'])->default('gasto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
