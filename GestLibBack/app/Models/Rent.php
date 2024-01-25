<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'library_section_id', 'rent_date', 'return_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function librarySection()
    {
        return $this->belongsTo(LibrarySection::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rent) {
            $rent->rent_date = Carbon::now();
            $rent->return_date= Carbon::now()->addDays(15);

        });
    }
}
