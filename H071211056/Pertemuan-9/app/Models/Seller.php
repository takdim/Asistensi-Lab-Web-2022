<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Strings;
use Carbon\Carbon;

class Seller extends Model
{
    protected $table = 'seller';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'gender', 'no_hp', 'status'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    use HasFactory;
    public function setNameAttribute($value)
    {
        $this->attributes['name']= strtolower($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/y');
    }


}
