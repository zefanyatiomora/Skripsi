<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\OkupasiModel;
use App\Models\KompetensiModel;

class OkupasiKompetensiModel extends Model
{
    use HasFactory;

    protected $table = 'okupasi_kompetensi';
    protected $primaryKey = 'id_okupasi_kompetensi';
    protected $fillable = [
        'id_okupasi',
        'id_kompetensi',
    ];

    public function okupasi(): BelongsTo
    {
        return $this->belongsTo(OkupasiModel::class, 'id_okupasi', 'id_okupasi');
    }
    public function kompetensi(): BelongsTo
    {
        return $this->belongsTo(KompetensiModel::class, 'id_kompetensi', 'id_kompetensi');
    }
}