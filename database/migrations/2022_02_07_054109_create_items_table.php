<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string( 'short_name', 25 );
            $table->string( 'name', 50);
            $table->integer('start_price');
            $table->string('short_desc', 50);
            $table->text('desc');
            $table->text('image_url');
            $table->text('animation_url')->nullable();
            $table->string( 'type', 25 );
            $table->tinyInteger('model_position');
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
        Schema::dropIfExists('items');
    }
}
