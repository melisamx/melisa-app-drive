<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     * @table driFilesProperties
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filesProperties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('idFile');
            $table->string('key', 100);
            $table->boolean('isPublic')->default(1);
            $table->text('value')->nullable();

            $table->unique(['idFile', 'key'], 'unique_driFilesProperties');

            $table->foreign('idFile')
                ->references('id')->on('files')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filesProperties');
    }
}
