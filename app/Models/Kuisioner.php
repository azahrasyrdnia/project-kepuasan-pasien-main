<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    use HasFactory;

    protected $table = 'kuisioners';

    protected $fillable = [
        'judul',
        'indeks_id',
    ];

    public function indeks()
    {
        return $this->belongsTo(Indek::class);
    }

    public function responden_kuisioner()
    {
        return $this->hasMany(RespondenKuisioner::class);
    }
}
