<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable()->comment('it contain blog title.');
            $table->text('description')->nullable()->comment('it contain blog description.');
            $table->string('start_date', 255)->nullable()->comment('Blog display start date.');
            $table->string('end_date')->nullable()->comment('Blog display end date.');
            $table->enum('is_active', [0, 1])->default(0)->nullable()->comment('1 = active, 2 = Inactive');
            $table->text('blog_image')->nullable()->comment('blog image path.');
            $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
}
