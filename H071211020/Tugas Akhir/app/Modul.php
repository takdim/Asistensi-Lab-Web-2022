<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use Uuid;

    protected $fillable = [
        'pertemuan_id', 'judul',
    ];

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }
}
