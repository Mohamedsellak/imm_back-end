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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('code')->notNull();
            $table->string('name')->notNull();
            $table->string('activity')->notNull();
            $table->text('address')->notNull();
            $table->string('zipcode')->notNull();
            $table->string('city')->notNull();
            $table->string('country')->notNull();
            $table->string('floor_area')->notNull();
            $table->unsignedBigInteger('workspace_id')->notNull(); 
            $table->foreign('workspace_id')->references('id')->on('workspaces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
