<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description'); 
            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedInteger('answers_count')->default(0);
            $table->integer('votes_count')->default(0);
            $table->enum('status',['open','reopen','closed','locked','deleted'])->default('open');
            $table->unsignedBigInteger('accepted_answer_id')->nullable();
            
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->foreign('accepted_answer_id')
                ->references('id')
                ->on('answers')
                ->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
