<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    /**
     * Run the migrations.
     */
    public function up()
    : void{
        Schema::create('cards', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->foreignId('column_id')->constrained()->onDelete('cascade');
            $table->foreignId('board_id')->constrained()->onDelete('cascade');
            $table->double('position');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->dateTime('due_date')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    : void{
        Schema::dropIfExists('cards');
    }
};
