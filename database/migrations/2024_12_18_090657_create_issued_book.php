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
        Schema::create('issued_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('SID')->foreign('SID')->references('SID')->on('students');
            $table->bigInteger('BookName');
            $table->bigInteger('AuthorId');
            $table->String('ISBN',50);
            $table->dateTime('IssueDate');
            $table->dateTime('DueDate');
            $table->dateTime('ReturnDate');
            $table->bigInteger('Day');
            $table->Double('Fine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_book');
    }
};
