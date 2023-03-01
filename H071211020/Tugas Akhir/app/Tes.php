<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    use Uuid;

    protected $fillable = [
        'mapel_id', 'periode_id', 'tanggal_ujian', 'status',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function tes_siswa()
    {
        return $this->hasMany(Tes_siswa::class);
    }
}
