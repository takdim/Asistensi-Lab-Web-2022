<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use Uuid;

    protected $fillable = [
        'user_id', 'tempat_lahir', 'tanggal_lahir', 'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapel()
    {
        return $this->HasOne(User::class);
    }

}
