<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScreeningMappingModel;

class ScreeningPertanyaanModel extends Model
{
    use HasFactory;

    protected $table = 'screening_pertanyaan';

    protected $primaryKey = 'id_pertanyaan';

    protected $fillable = [
        'pertanyaan',
    ];

    // RELASI KE SCREENING MAPPING
    public function mapping()
    {
        return $this->hasMany(
            ScreeningMappingModel::class,
            'id_pertanyaan',
            'id_pertanyaan'
        );
    }
}