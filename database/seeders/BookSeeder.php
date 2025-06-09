<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['book_id' => 1, 'title' => 'Clean Code', 'author' => 'Robert C. Martin', 'stock' => 3, 'created_at' => '2025-04-24 07:01:52'],
            ['book_id' => 2, 'title' => 'You Don’t Know JS', 'author' => 'Kyle Simpson', 'stock' => 3, 'created_at' => '2025-04-24 07:01:52'],
            ['book_id' => 3, 'title' => 'Eloquent JS', 'author' => 'Marijn Haverbeke', 'stock' => 2, 'created_at' => '2025-04-24 07:01:52'],
            ['book_id' => 4, 'title' => '1984', 'author' => 'George Orwell', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 5, 'title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'stock' => 5, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 6, 'title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 7, 'title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 8, 'title' => 'Moby-Dick', 'author' => 'Herman Melville', 'stock' => 1, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 9, 'title' => 'War and Peace', 'author' => 'Leo Tolstoy', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 10, 'title' => 'The Catcher in the Rye', 'author' => 'J.D. Salinger', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 11, 'title' => 'Brave New World', 'author' => 'Aldous Huxley', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 12, 'title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'stock' => 6, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 13, 'title' => 'Fahrenheit 451', 'author' => 'Ray Bradbury', 'stock' => 5, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 14, 'title' => 'Crime and Punishment', 'author' => 'Fyodor Dostoevsky', 'stock' => 2, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 15, 'title' => 'The Lord of the Rings', 'author' => 'J.R.R. Tolkien', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 16, 'title' => 'The Chronicles of Narnia', 'author' => 'C.S. Lewis', 'stock' => 5, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 17, 'title' => 'Jane Eyre', 'author' => 'Charlotte Brontë', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 18, 'title' => 'Wuthering Heights', 'author' => 'Emily Brontë', 'stock' => 2, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 19, 'title' => 'Les Misérables', 'author' => 'Victor Hugo', 'stock' => 2, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 20, 'title' => 'Anna Karenina', 'author' => 'Leo Tolstoy', 'stock' => 2, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 21, 'title' => 'The Alchemist', 'author' => 'Paulo Coelho', 'stock' => 6, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 22, 'title' => 'The Little Prince', 'author' => 'Antoine de Saint-Exupéry', 'stock' => 5, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 23, 'title' => 'Sapiens: A Brief History of Humankind', 'author' => 'Yuval Noah Harari', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 24, 'title' => 'Educated', 'author' => 'Tara Westover', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 25, 'title' => 'Becoming', 'author' => 'Michelle Obama', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 26, 'title' => 'The Power of Habit', 'author' => 'Charles Duhigg', 'stock' => 5, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 27, 'title' => 'Thinking, Fast and Slow', 'author' => 'Daniel Kahneman', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 28, 'title' => 'Atomic Habits', 'author' => 'James Clear', 'stock' => 6, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 29, 'title' => 'The Subtle Art of Not Giving a F*ck', 'author' => 'Mark Manson', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 30, 'title' => 'The Four Agreements', 'author' => 'Don Miguel Ruiz', 'stock' => 5, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 31, 'title' => 'Grit: The Power of Passion and Perseverance', 'author' => 'Angela Duckworth', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 32, 'title' => 'Outliers', 'author' => 'Malcolm Gladwell', 'stock' => 4, 'created_at' => '2025-04-24 07:32:20'],
            ['book_id' => 33, 'title' => 'Quiet: The Power of Introverts in a World That Can’t Stop Talking', 'author' => 'Susan Cain', 'stock' => 3, 'created_at' => '2025-04-24 07:32:20'],
        ]);
    }
}
