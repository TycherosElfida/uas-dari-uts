<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loans')->insert([
            ['loan_id' => 1, 'user_id' => 2, 'book_id' => 2, 'borrow_date' => '2025-04-10', 'due_date' => '2025-04-17', 'return_date' => '2025-05-02', 'total_penalty' => 15000.00],
            ['loan_id' => 2, 'user_id' => 2, 'book_id' => 1, 'borrow_date' => '2025-04-12', 'due_date' => '2025-04-19', 'return_date' => '2025-04-18', 'total_penalty' => 0.00],
            ['loan_id' => 3, 'user_id' => 2, 'book_id' => 3, 'borrow_date' => '2025-04-15', 'due_date' => '2025-04-22', 'return_date' => '2025-05-02', 'total_penalty' => 10000.00],
            ['loan_id' => 4, 'user_id' => 2, 'book_id' => 4, 'borrow_date' => '2025-04-24', 'due_date' => '2025-05-01', 'return_date' => '2025-04-24', 'total_penalty' => 0.00],
            ['loan_id' => 5, 'user_id' => 2, 'book_id' => 20, 'borrow_date' => '2025-04-24', 'due_date' => '2025-05-01', 'return_date' => '2025-05-02', 'total_penalty' => 1000.00],
            ['loan_id' => 6, 'user_id' => 2, 'book_id' => 28, 'borrow_date' => '2025-04-24', 'due_date' => '2025-05-01', 'return_date' => '2025-04-24', 'total_penalty' => 0.00],
            ['loan_id' => 7, 'user_id' => 2, 'book_id' => 19, 'borrow_date' => '2025-04-24', 'due_date' => '2025-05-01', 'return_date' => null, 'total_penalty' => 0.00],
            ['loan_id' => 8, 'user_id' => 2, 'book_id' => 8, 'borrow_date' => '2025-04-24', 'due_date' => '2025-05-01', 'return_date' => null, 'total_penalty' => 0.00],
            ['loan_id' => 9, 'user_id' => 2, 'book_id' => 28, 'borrow_date' => '2025-05-02', 'due_date' => '2025-05-09', 'return_date' => '2025-05-02', 'total_penalty' => 0.00],
        ]);
    }
}
