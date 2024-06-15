<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecyclingItemsTable extends Migration
{
    public function up()
    {
        Schema::create('recycle', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('quantity');
            $table->string('pick_up_address');
            $table->date('pick_up_date');
            $table->string('telephone_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recycle');
    }
}
