<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('vote_type');//+1 , -1 only
            $table->foreignId('voted_by')->constrained('users')->cascadeOnDelete();
            
 
            $table->unsignedBigInteger('votable_id');
            $table->string('votable_type');

            $table->timestamps();

            $table->unique(['voted_by', 'votable_id', 'votable_type'], 'user_votable_unique');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
