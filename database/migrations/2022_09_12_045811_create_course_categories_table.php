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
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->tinyInteger('is_feature')->default(1)->comment('0=no, 1=yes');
            $table->string('slug');

            $table->tinyInteger('status')->default(1)->comment('0=inactive, 1=active');
            $table->tinyInteger('existence')->default(1)->comment('0=deleted, 1=active');

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
        Schema::dropIfExists('course_categories');
    }
};
