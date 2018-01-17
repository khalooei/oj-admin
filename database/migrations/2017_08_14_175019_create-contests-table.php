<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('slug');
            // $table->enum('is_enabled', ['enabled', 'not-enabled']);
            $table->boolean('enabled')->default(false);

            $table->text('description');

            $table->boolean('is_timer_on')->default(false);
            $table->datetime('active_at');
            $table->datetime('start_at');
            $table->datetime('freeze_at');
            $table->datetime('unfreeze_at');
            $table->datetime('end_at');

            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('contests');
    }
}
