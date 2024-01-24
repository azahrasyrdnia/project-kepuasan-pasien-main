<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';

    protected $fillable = [
        'name',
        'icon',
        'skor',
    ];

    public function responden_kuisioner()
    {
        return $this->hasMany(RespondenKuisioner::class);
    }
}
