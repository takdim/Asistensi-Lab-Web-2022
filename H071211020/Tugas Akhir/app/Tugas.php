<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use Uuid;

    protected $fillable = [
        'pertemuan_id', 'deskripsi', 'batas_waktu',
    ];

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }

    public function tugas_siswa()
    {
        return $this->hasMany(tugas_siswa::class);
    }
}
