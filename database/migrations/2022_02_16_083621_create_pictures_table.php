<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('picture_set_id')->constrained('picture_sets')->cascadeOnDelete();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->string('in_stock', 25);
            $table->boolean('settings');
            $table->string('order_name');
            $table->string('articule');
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
        Schema::dropIfExists('pictures');
    }
}
