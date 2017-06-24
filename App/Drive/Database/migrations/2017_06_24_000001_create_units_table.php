<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     * @table driUnits
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('idIdentityCreated', 36);
            $table->string('name', 75)->unique();
            $table->boolean('active')->default(1);
            $table->boolean('versionActive')->default(0);
            $table->boolean('approvalRequired')->default(0);
            $table->smallInteger('totalFiles')->default(0);
            $table->string('source', 255);
            $table->dateTime('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->char('idIdentityUpdated', 36)->nullable();
            $table->string('description', 200)->nullable();
            $table->dateTime('updatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
