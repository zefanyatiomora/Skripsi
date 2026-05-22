<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasilJawabanModel;
use App\Models\PenggunaModel;
use App\Models\ClusterSkillModel;

class HasilTesModel extends Model
{
    use HasFactory;

    protected $table = 'hasil_tes';
    protected $primaryKey = 'id_hasil';

    protected $fillable = [
        'id_pengguna',
        'id_cluster_skill',
        'tanggal_tes'
    ];
      protected $casts = [
        'tanggal_tes' => 'datetime',
    ];

    // Relasi ke pengguna
    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'id_pengguna', 'id_pengguna');
    }

    // Relasi ke cluster
    public function cluster()
    {
        return $this->belongsTo(ClusterSkillModel::class, 'id_cluster_skill', 'id_cluster_skill');
    }

    // Relasi ke jawaban
    public function jawaban()
    {
        return $this->hasMany(HasilJawabanModel::class, 'id_hasil', 'id_hasil');
    }

    // Relasi ke hasil rekomendasi
    public function rekomendasi()
    {
        return $this->hasMany(HasilRekomendasiModel::class, 'id_hasil', 'id_hasil');
    }
}