<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'book_cover',
        'book_synopsis',
        'released_on',
        'book_status'
    ];

    protected $primaryKey = 'book_id';

    public function category()
    {
        return $this->belongsTo(Category::class);

    }
}
