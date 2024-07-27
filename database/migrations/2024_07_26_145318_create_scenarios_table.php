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
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNull();
            $table->integer('start_year')->notNull();
            $table->integer('end_year')->notNull();
            $table->integer('duration')->storedAs('end_year - start_year');
            $table->string('maintenance_strategy')->notNull();
            $table->string('budgetary_constraint')->notNull();
            $table->string('status')->notNull();
            $table->unsignedBigInteger('project_id')->notNull();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenarios');
    }
};
