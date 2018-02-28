<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     * @table driFiles
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('idUnit');
            $table->smallInteger('idMimeType');
            $table->uuid('idIdentityCreated');
            $table->string('name', 150);
            $table->boolean('starred')->default(0);
            $table->boolean('trashed')->default(0);
            $table->boolean('shared')->default(0);
            $table->boolean('editing')->default(0);
            $table->decimal('size', 12, 2)->default(0);
            $table->string('originalFilename', 150);
            $table->double('version')->default('1.0');
            $table->dateTime('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->uuid('idIdentityUpdated')->nullable();
            $table->string('fileExtension', 10)->nullable();
            $table->string('md5Checksum', 50)->nullable();
            $table->dateTime('updatedAt')->nullable();

            $table->foreign('idUnit')
                ->references('id')->on('units')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('idMimeType')
                ->references('id')->on('mimesTypes')
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
        Schema::dropIfExists('files');
    }
}
