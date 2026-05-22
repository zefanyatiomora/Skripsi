<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasilTesModel;
use App\Models\OkupasiModel;

class HasilRekomendasiModel extends Model
{
    use HasFactory;

    protected $table = 'hasil_rekomendasi';
    protected $primaryKey = 'id_hasil_rekomendasi';

    protected $fillable = [
        'id_hasil',
        'id_okupasi',
        'skor'
    ];

    // Relasi ke hasil tes
    public function hasil()
    {
        return $this->belongsTo(HasilTesModel::class, 'id_hasil', 'id_hasil');
    }

    // Relasi ke okupasi
    public function okupasi()
    {
        return $this->belongsTo(OkupasiModel::class, 'id_okupasi', 'id_okupasi');
    }
}