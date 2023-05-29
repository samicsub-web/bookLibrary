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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('description');
            $table->text('summary')->nullable();
            $table->string('language')->nullable();
            $table->integer('category')->nullable();
            $table->integer('type')->nullable(); //Keeps edition
            $table->integer('pages');
            $table->integer('rent_count')->default(0);
            $table->string('isbn')->nullable();
            $table->string('pub_in')->nullable()->comment('Publish Country');
            $table->date('pub_date')->nullable();
            $table->double('rent_price', 10, 2)->default(0);
            $table->integer('rentage_period')->comment('Number of days for user to access');
            $table->string('cover_photo');
            $table->string('file')->nullable();
            $table->string('file_type')->nullable();
            $table->boolean('is_free')->default(false)->comment('if its free access or not');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
