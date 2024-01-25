<?php

namespace Database\Seeders;

use App\Models\TypeCopy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeCopy::create([           
        'name' => 'Físico']);
        TypeCopy::create([            
        'name' => 'Digital']);
    }
}
