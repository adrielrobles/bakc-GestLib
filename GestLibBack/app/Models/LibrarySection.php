<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibrarySection extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id', 'type_copy_id', 'copies','available_copies','copies'
    ];

    // Relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    // Relationship with TypeCopy
    public function typeCopy()
    {
        return $this->belongsTo(TypeCopy::class, 'type_copy_id');
    }
    
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
