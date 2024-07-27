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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('code')->notNull();
            $table->string('name')->notNull();
            $table->double('quantity')->notNull();
            $table->string('unit')->notNull();
            $table->string('last_rehabilitation_year')->notNull();
            $table->enum('condition', ['C1', 'C2', 'C3', 'C4'])->notNull();
            $table->enum('severity_max', ['S1', 'S2', 'S3', 'S4'])->notNull();
            $table->enum('risk_level', ['R1', 'R2', 'R3', 'R4'])->notNull();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('building_id')->notNull();
            $table->timestamps();

            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
