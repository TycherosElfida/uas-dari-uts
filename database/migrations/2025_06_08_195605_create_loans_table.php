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
        Schema::create('loans', function (Blueprint $table) {
            $table->id('loan_id');

            $table->foreignId('user_id')
                ->comment('FK → users.id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('book_id')
                ->comment('FK → books.book_id')
                ->constrained('books', 'book_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->date('borrow_date')->comment('Tanggal pinjam');
            $table->date('due_date')->comment('Tanggal jatuh tempo');
            $table->date('return_date')->nullable()->comment('Tanggal kembali (NULL jika belum)');
            $table->decimal('total_penalty', 10, 2)->default(0.00)->comment('Denda akumulasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
