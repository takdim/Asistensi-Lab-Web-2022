<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Nilai_siswa extends Model
{
    use Uuid;

    protected $fillable = [
        'user_id', 'absensi', 'tugas', 'tes', 'nilai_akhir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
