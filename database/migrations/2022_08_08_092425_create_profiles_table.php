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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('gender_id')->nullable();
            $table->foreignId('generation_id')->nullable();
            $table->foreignId('major_id')->nullable();
            $table->boolean('is_lead')->default(false);
            $table->boolean('is_manager')->default(false);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('current_place')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('biography')->nullable();
            
            $table->string('job')->nullable();
            $table->string('instance')->nullable();
            
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();

            $table->foreign('current_place')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('birth_place')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
