<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fabric_set_id')->constrained('fabric_sets')->cascadeOnDelete();
            //$table->foreignId('color_id')->constrained('colors')->cascadeOnDelete();
            $table->text('image_url');
            $table->integer('price')->nullable();
            $table->string('name');
            $table->boolean('in_stock');
            //$table->decimal('extra', 3, 0);
            $table->string('settings')->nullable();
            $table->string('order_name');
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
        Schema::dropIfExists('fabrics');
    }
}
