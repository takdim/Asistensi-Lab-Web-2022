<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use Uuid;

    protected $fillable = [
        'mapel_id', 'kode_soal', 'soal', 'a', 'b', 'c', 'd', 'jawaban','gambar', 'status',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

}
