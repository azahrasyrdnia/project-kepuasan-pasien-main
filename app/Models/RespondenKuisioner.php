<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondenKuisioner extends Model
{
    use HasFactory;

    protected $table = 'responden_kuisioners';

    protected $fillable = [
        'identitas_kuisioner_id',
        'kuisioner_id',
        'jawaban_id',
        'keluhan',
        'skor',
        'created_at',
        'updated_at',
    ];


    public function identitas_kuisioner()
    {
        return $this->belongsTo(IdentitasKuisioner::class);
    }

    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
}
