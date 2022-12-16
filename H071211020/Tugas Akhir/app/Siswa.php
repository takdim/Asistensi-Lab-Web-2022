<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use Uuid;

    protected $fillable = [
        'kelas_id', 'user_id', 'jk', 'tempat_lahir', 'tanggal_lahir', 'email', 'asal',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tugas_siswa()
    {
        return $this->hasmany(Tugas_siswa::class);
    }

}
