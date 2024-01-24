<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'name',
        'jenis_rawat',
        'bagian_id',
        'indek_id',
        'saran_kritik',
        'status_laporan',
        'created_at',
        'updated_at',

    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    public function indek()
    {
        return $this->belongsTo(Indek::class);
    }
}
