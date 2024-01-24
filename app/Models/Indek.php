<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indek extends Model
{
    use HasFactory;

    protected $table = 'indeks';

    protected $fillable = [
        'jenis',
    ];

    public function kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
