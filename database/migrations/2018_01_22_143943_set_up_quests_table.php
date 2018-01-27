<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetUpQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('slug');

            $table->text('description');
            $table->text('expected_answer');
            $table->text('categories');
            $table->string('expected_answer_type')->default('and'); // 'or' atau 'and'

            $table->string('state');
            $table->string('type');
            $table->dateTime('expired_at');

            $table->integer('level_value')->unsigned()->default(1);            

            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('exercise_id')->unsigned(); // hasmanythrough
            
            $table->text('answers');       
            $table->string('state');       
            $table->string('duration');

            $table->text('benchmark');       

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
        Schema::dropIfExists('exercises');
    }
}
