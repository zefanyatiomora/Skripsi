<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AreaFungsiModel;

class ClusterSkillModel extends Model
{
    use HasFactory;

    protected $table = 'cluster_skill';
    protected $primaryKey = 'id_cluster_skill';
    protected $fillable = [
        'id_area_fungsi',
        'nama_cluster',
    ];

    public function areaFungsi() {
        return $this->belongsTo(AreaFungsiModel::class, 'id_area_fungsi', 'id_area_fungsi');
    }
    public function okupasi()
{
    return $this->hasMany(
        OkupasiModel::class,
        'id_cluster',      // FK di tabel okupasi
        'id_cluster'       // PK di cluster
    );
}

}
