<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaFungsiModel extends Model
{
    use HasFactory;

    protected $table = 'area_fungsi';
    protected $primaryKey = 'id_area_fungsi';
    protected $fillable = [
        'kode_area_fungsi',
        'nama_area_fungsi',
        'deskripsi',
    ];

    public $timestamps = true;
}