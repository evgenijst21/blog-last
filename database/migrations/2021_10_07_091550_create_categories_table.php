<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(false)->default(0);
            $table->string('name', 250);
            $table->string('slug', 250)->unique();
            $table->string('seo_title', 250)->nullable();
            $table->string('seo_keyword', 250)->nullable();
            $table->string('image', 50)->nullable();
            $table->string('desc', 500)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
