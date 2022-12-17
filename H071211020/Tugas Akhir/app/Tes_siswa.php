<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Tes_siswa extends Model
{
    use Uuid;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function tes()
    {
        return $this->belongsTo(Tes::class);
    }

}
