<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->nullable()->default(null);
            $table->string('phone', 64)->nullable()->default(null);
            $table->string('address', 256)->nullable()->default(null);
            $table->string('condition', 256)->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('body');
            $table->string('status', 32);
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
        Schema::dropIfExists('tickets');
    }
}
