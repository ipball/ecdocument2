<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_no', 50)->unique();
            $table->string('name', 100);
            $table->string('reference', 100)->nullable(true);
            $table->string('store', 100)->nullable(true);
            $table->text('description')->nullable(true);
            $table->enum('status', ['normal', 'canceled', 'lost'])->default('normal');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('categorie_id');
            $table->integer('mediafile_id');
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
        Schema::dropIfExists('documents');
    }
}
