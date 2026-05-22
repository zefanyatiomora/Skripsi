<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasilTesModel;
use App\Models\KompetensiModel;

class HasilJawabanModel extends Model
{
    use HasFactory;

    protected $table = 'hasil_jawaban';
    protected $primaryKey = 'id_jawaban';

    protected $fillable = [
        'id_hasil',
        'id_kompetensi',
        'nilai'
    ];

    // Relasi ke hasil tes
    public function hasil()
    {
        return $this->belongsTo(HasilTesModel::class, 'id_hasil', 'id_hasil');
    }

    // Relasi ke kompetensi
    public function kompetensi()
    {
        return $this->belongsTo(KompetensiModel::class, 'id_kompetensi', 'id_kompetensi');
    }
}