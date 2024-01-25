<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'release_date', 'category_id'
    ];

    // Many-to-many relationship with TypeCopy
    public function typeCopies()
    {
        return $this->belongsToMany(TypeCopy::class, 'library_sections', 'book_id', 'type_copy_id')
            ->withPivot('available_copies')
            ->using(LibrarySection::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
