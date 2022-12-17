<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use Uuid;

    protected $fillable = [
        'nama_kelas',
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

}
