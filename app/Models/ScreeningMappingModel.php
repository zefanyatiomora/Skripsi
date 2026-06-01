<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningMappingModel extends Model
{
    use HasFactory;

    protected $table = 'screening_mapping';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pertanyaan',
        'id_cluster_skill',
    ];

    // RELASI KE PERTANYAAN
    public function pertanyaan()
    {
        return $this->belongsTo(
            ScreeningPertanyaanModel::class,
            'id_pertanyaan',
            'id_pertanyaan'
        );
    }

    // RELASI KE CLUSTER SKILL
    public function clusterSkill()
    {
        return $this->belongsTo(
            ClusterSkillModel::class,
            'id_cluster_skill',
            'id_cluster_skill'
        );
    }
}