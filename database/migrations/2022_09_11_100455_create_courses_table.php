<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('instructor_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedInteger('difficulty_level_id')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->mediumText('description');
            $table->mediumText('feature_details')->nullable();
            $table->decimal('price')->default(0.00);
            $table->unsignedInteger('learner_accessibility')->default(1)->comment('1=paid, 2=free');
            $table->string('image')->nullable();


            $table->string('video')->nullable();
            $table->tinyInteger('intro_video_check')->comment('1=normal video, 2=youtube_video')->nullable();
            $table->string('youtube_video_id')->nullable();



            $table->string('slug');
            $table->tinyInteger('status')->default(0)->comment('0=pending, 1=published, 2=waiting_for_review, 3=hold, 4=draft');



            $table->decimal('average_rating')->default(0.0)->nullable();




            $table->tinyInteger('existence')->default(1)->comment('0=deleted, 1=active')->nullable();

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
        Schema::dropIfExists('courses');
    }
};
