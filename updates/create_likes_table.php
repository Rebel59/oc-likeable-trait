<?php namespace Rebel59\Likeable\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLikesTable extends Migration
{
    public function up()
    {
        Schema::create('rebel59_likeable_likes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('likeable_id')->nullable();
            $table->string('likeable_type')->nullable();
            $table->timestamps();
            $table->index(['likeable_id', 'likeable_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('rebel59_likeable_likes');
    }
}
