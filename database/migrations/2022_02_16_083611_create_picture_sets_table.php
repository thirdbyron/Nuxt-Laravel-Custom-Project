<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePictureSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('picture_position_id')->constrained('picture_positions')->cascadeOnDelete();
            $table->string('name');
            //$table->decimal('extra', 3, 0);
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
        Schema::dropIfExists('picture_sets');
    }
}
