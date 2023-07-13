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
        Schema::create('user_informations', function (Blueprint $table) {
            $table->foreignId('users_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('user_favorites_books')->nullable();
            $table->text('user_wish_books')->nullable();
            $table->integer('book_id')->nullable();
            $table->integer('stop_id')->nullable();
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
        Schema::dropIfExists('user_informations');
    }
};
