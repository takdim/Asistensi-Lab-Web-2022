<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tugas_siswa extends Model
{
    use Uuid;

    protected $fillable = [
        'tugas_id', 'siswa_id', 'file',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
