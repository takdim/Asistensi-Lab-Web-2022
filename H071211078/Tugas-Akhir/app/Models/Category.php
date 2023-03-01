<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name','category_status','added_on'
    ];

    protected $primaryKey ='category_id';
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
