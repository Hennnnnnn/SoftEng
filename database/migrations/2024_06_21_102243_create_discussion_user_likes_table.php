<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionUserLikesTable extends Migration
{
    public function up()
    {
        Schema::create('discussion_user_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discussion_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Add unique constraint to prevent duplicate likes
            $table->unique(['discussion_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussion_user_likes');
    }
}
