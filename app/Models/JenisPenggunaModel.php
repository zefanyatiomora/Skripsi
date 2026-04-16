<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPenggunaModel extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengguna';
    protected $primaryKey = 'id_jenis_pengguna';

    protected $fillable = [
        'nama_jenis_pengguna',
    ];

    // Relasi ke pengguna (1 jenis punya banyak pengguna)
    public function pengguna()
    {
        return $this->hasMany(PenggunaModel::class, 'id_jenis_pengguna', 'id_jenis_pengguna');
    }
}