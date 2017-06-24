<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesParentsTable extends Migration
{
    /**
     * Run the migrations.
     * @table driFilesParents
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filesParents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('idFile', 36);
            $table->char('idFileParent', 36);

            $table->unique(['idFile', 'idFileParent'], 'unique_filesParents');

            $table->foreign('idFile')
                ->references('id')->on('files')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('idFileParent')
                ->references('id')->on('files')
                ->onDelete('cascade')
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
        Schema::dropIfExists('filesParents');
    }
}
