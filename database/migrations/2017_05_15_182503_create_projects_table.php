<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description');
          $table->string('slug');
          $table->string('seo_title')->nullable();
          $table->string('seo_description')->nullable();
          $table->string('seo_keywords')->nullable();
          $table->timestamps();
        });

        Schema::create('photo_categories', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('seo_title')->nullable();
          $table->string('seo_description')->nullable();
          $table->string('seo_keywords')->nullable();
          $table->timestamps();
        });

        Schema::create('photos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('project_id');
          $table->integer('category_id');
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
      Schema::dropIfExists('photos');
      Schema::dropIfExists('photo_categories');
      Schema::dropIfExists('projects');
    }
}
