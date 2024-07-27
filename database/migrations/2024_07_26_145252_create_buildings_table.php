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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('code')->notNull();
            $table->string('name')->notNull();
            $table->string('activity')->notNull();
            $table->string('address')->notNull();
            $table->integer('year_of_construction')->notNull();
            $table->double('surface')->notNull();
            $table->string('type')->notNull();
            $table->string('level_count')->notNull();
            $table->text('structure_state')->nullable();
            $table->text('electricity_inventory')->nullable();
            $table->text('plumbing_state')->nullable();
            $table->text('cvc_state')->nullable();
            $table->text('fire_safety_evaluation')->nullable();
            $table->text('elevator_escalator_state')->nullable();
            $table->unsignedBigInteger('site_id')->notNull();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
