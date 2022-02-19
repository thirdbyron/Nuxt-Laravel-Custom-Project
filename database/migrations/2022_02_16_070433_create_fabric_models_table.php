<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fabric_set_id')->constrained('fabric_sets')->cascadeOnDelete();
            $table->foreignId('model_id')->constrained('model_ofs')->cascadeOnDelete();
            $table->foreignId('fabric_id')->constrained('fabrics')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fabric_models');
    }
}
