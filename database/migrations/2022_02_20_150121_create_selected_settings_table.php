<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_item_id')->constrained('created_items')->cascadeOnDelete();
            $table->integer('setting_id');
            $table->string('setting_entity_name');
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
        Schema::dropIfExists('selected_settings');
    }
}
