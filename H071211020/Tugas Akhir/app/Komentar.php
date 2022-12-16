<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use Uuid;

    protected $fillable = [
        'user_id', 'pertemuan_id', 'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }

}
