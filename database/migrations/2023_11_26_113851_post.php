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
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('user_id');
            $table->text('title');
            $table->text('description');
            $table->text('post_url')->unique();
            $table->text('featured_image')->nullable();
            $table->integer('hit_count');
            $table->enum('status',['Pending', 'Wait', 'Active'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
