<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClusterSkillModel extends Model
{
    use HasFactory;

    protected $table = 'cluster_skill';
    protected $primaryKey = 'id_cluster_skill';

    protected $fillable = [
        'id_domain',
        'nama_cluster',
        'deskripsi'
    ];
    public function domain()
    {
        return $this->belongsTo(
            DomainModel::class,
            'id_domain',
            'id_domain'
        );
    }
    public function okupasi()
    {
        return $this->hasMany(
            OkupasiModel::class,
            'id_cluster_skill',
            'id_cluster_skill'
        );
    }
    public function screeningMapping()
{
    return $this->hasMany(
        ScreeningMappingModel::class,
        'id_cluster_skill',
        'id_cluster_skill'
    );
}
}
