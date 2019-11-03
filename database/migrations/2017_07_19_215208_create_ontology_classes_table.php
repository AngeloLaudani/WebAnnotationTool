<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOntologyClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ontology_classes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('domain_id');
          $table->string('class_name')->nullable();
          $table->boolean('context_class');
          $table->string('target_class')->nullable();
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
        Schema::dropIfExists('ontology_classes');
    }
}
