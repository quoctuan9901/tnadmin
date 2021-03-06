<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial')->nullable();
            $table->string('title');
            $table->integer('import_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->integer('access');
            $table->string('target_open');
            $table->string('meta_robot');
            $table->integer('viewed')->default(100);
            $table->string('youtube')->nullable();
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->string('status');
            $table->string('featured');
            $table->string('slug')->nullable();
            $table->string('title_tag')->nullable();
            $table->string('meta_keywords_tag')->nullable();
            $table->string('meta_description_tag')->nullable();
            if (env('APP_LANG')) {
                $table->string('title_en')->nullable();
                $table->text('intro_en')->nullable();
                $table->text('content_en')->nullable();
                $table->string('slug_en')->nullable();
                $table->string('title_tag_en')->nullable();
                $table->string('meta_keywords_tag_en')->nullable();
                $table->string('meta_description_tag_en')->nullable();
            }
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('manufacturer_id')->unsigned();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
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
        Schema::dropIfExists('product');
    }
}
