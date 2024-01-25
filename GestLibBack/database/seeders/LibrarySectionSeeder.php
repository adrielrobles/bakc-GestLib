<?php

namespace Database\Seeders;

use App\Models\LibrarySection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LibrarySection::create([
            'book_id' => 1,
            'type_copy_id' => 1,
            'copies'=>10,
            'available_copies' => 10,
        ]);
        LibrarySection::create([
            'book_id' => 2,
            'type_copy_id' => 2,
            'copies'=>10,
            'available_copies' => 10,
        ]);
    }
}
