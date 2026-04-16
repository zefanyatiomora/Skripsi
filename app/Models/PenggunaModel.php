<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PenggunaModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama_pengguna',
        'nim_pengguna',
        'email_pengguna',
        'password',
        'role',
        'id_jenis_pengguna',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Relasi ke jenis pengguna
     */
    public function jenisPengguna()
    {
        return $this->belongsTo(
            JenisPenggunaModel::class,
            'id_jenis_pengguna',
            'id_jenis_pengguna'
        );
    }
    public function getAuthIdentifierName()
{
    return 'nim_pengguna';
}
}