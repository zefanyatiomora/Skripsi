<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OkupasiModel extends Model
{
    use HasFactory;

    protected $table = 'okupasi';

    protected $primaryKey = 'id_okupasi';

    protected $fillable = [
        'kode_okupasi',
        'id_cluster_skill',
        'id_area_fungsi',
        'nama_okupasi',
        'deskripsi',
    ];

    public function clusterSkill()
    {
        return $this->belongsTo(
            ClusterSkillModel::class,
            'id_cluster_skill',
            'id_cluster_skill'
        );
    }

    public function areaFungsi()
    {
        return $this->belongsTo(
            AreaFungsiModel::class,
            'id_area_fungsi',
            'id_area_fungsi'
        );
    }

    public function kompetensi()
    {
        return $this->belongsToMany(
            KompetensiModel::class,
            'okupasi_kompetensi',
            'id_okupasi',
            'id_kompetensi'
        )
        ->withPivot('id_okupasi_kompetensi')
        ->withTimestamps();
    }
}