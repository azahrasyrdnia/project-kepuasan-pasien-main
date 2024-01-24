<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasKuisioner extends Model
{
    use HasFactory;

    protected $table = 'identitas_kuisioners';

    protected $fillable = [
        'nama_lengkap',
        'no_telepon',
        'jenis_rawat',
        'jenis_tanggungan',
        'selesai_kuisioner',
        'created_at',
        'updated_at',

    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    public function responden_kuisioner()
    {
        return $this->hasMany(RespondenKuisioner::class);
    }
}
