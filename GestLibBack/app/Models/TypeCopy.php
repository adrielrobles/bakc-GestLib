<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCopy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

     // Many-to-many relationship with Book through LibrarySection
     public function books()
     {
         return $this->belongsToMany(Book::class, 'library_sections', 'type_copy_id', 'book_id')
             ->withPivot('available_copies')
             ->using(LibrarySection::class);
     }
}
