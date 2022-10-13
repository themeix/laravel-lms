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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('user_id');

            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('province_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('professional_title')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('postal_code', 100)->nullable();
            $table->string('address')->nullable();
            $table->mediumText('about_me')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('facebook')->nullable()->default('https://www.facebook.com/');
            $table->string('twitter')->nullable()->default('https://www.twitter.com/');
            $table->string('linkedin')->nullable()->default('https://www.linkedin.com/');
            $table->string('pinterest')->nullable()->default('https://www.pinterest.com/');
            $table->string('slug')->nullable();
            $table->tinyInteger('is_private')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('remove_from_web_search')->default(0)->comment('0=no, 1=yes');

            $table->tinyInteger('status')->default(1)->comment('0=pending, 1=approved, 2=blocked');
            $table->tinyInteger('existence')->default(1)->comment('0=deleted, 1=active')->nullable();


            $table->string('cv_file')->nullable();
            $table->string('cv_filename')->nullable();

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
        Schema::dropIfExists('instructors');
    }
};
