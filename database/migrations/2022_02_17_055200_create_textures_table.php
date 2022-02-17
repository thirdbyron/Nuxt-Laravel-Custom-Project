<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTexturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fabric_id')->constrained('fabrics');
            $table->foreignId('model_id')->constrained('models')->cascadeOnDelete();
            $table->string('texture_name');
            $table->text('texture_path');
            $table->string('texture_mimetype', 10);
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
        Schema::dropIfExists('textures');
    }
}
