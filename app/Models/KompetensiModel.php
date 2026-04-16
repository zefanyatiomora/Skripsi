<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiModel extends Model
{
    use HasFactory;

    protected $table = 'kompetensi';
    protected $primaryKey = 'id_kompetensi';
    protected $fillable = [
        'kode_kompetensi',
        'kompetensi',
    ];

    public $incrementing = true;
    public function okupasis()
{
    return $this->belongsToMany(OkupasiModel::class, 'okupasi_kompetensi', 'id_kompetensi', 'id_okupasi')
    ->withPivot('id_okupasi_kompetensi')
    ->withTimestamps();
}
}