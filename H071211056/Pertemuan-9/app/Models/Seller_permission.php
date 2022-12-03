<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;
use App\Models\Permission;
use Carbon\Carbon;

class Seller_permission extends Model
{
    protected $table = 'seller_permission';
    protected $primaryKey = 'id';
    protected $fillable = ['seller_id', 'permission_id'];

    public function seller()
    {
        $this->hasManyThrough(Seller::class, Permission::class);
        return $this->belongsTo(Seller::class,'seller_id');
    }
    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
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
