<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    use HasFactory;

    protected $table = 'domain';

    protected $primaryKey = 'id_domain';

    public $timestamps = false;

    protected $fillable = [
        'nama_domain'
    ];

    public function clusterSkill()
    {
        return $this->hasMany(
            ClusterSkillModel::class,
            'id_domain',
            'id_domain'
        );
    }
}