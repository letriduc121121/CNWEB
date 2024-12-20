<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // id (Primary Key)
            $table->string('computer_name', 50); // computer_name
            $table->string('model', 100); // model
            $table->string('operating_system', 50); // operating_system
            $table->string('processor', 50); // processor
            $table->integer('memory'); // memory
            $table->boolean('available')->default(true); // available
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
