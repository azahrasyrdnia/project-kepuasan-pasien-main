<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;

    protected $table = 'bagians';

    protected $fillable = [
        'name',
        'role',
    ];

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function identitas_kuisioner()
    {
        return $this->hasMany(Kuisioner::class);
    }
}
