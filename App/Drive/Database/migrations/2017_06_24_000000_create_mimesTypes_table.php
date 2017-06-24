<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMimesTypesTable extends Migration
{
    /**
     * Run the migrations.
     * @table driMimesTypes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mimesTypes', function (Blueprint $table) {
            $table->smallInteger('id', true);
            $table->string('name', 150)->unique();
            $table->string('iconCls', 50)->default('x-fa fa fa-file');
            $table->smallInteger('order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mimesTypes');
    }
}
