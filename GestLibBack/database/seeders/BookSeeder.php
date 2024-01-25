<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'El Señor de los Anillos',
            'author' => 'J.R.R. Tolkien',
            'release_date' => '1954-07-29',
            'category_id' => 1, 
        ]);

        Book::create([
            'title' => 'Cien años de soledad',
            'author' => 'Gabriel García Márquez',
            'release_date' => '1967-05-30',
            'category_id' => 2, 
        ]);
    }
}
