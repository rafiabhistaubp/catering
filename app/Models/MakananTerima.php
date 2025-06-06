<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakananTerima extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi plural
    protected $table = 'makanan_terima';
    
    protected $primaryKey = 'id';
    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',
        'pesanan_id',
        'porsi_terima',
        'created_at',
        'updated_at',
    ];

    // Tentukan relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Tentukan relasi dengan tabel Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesan::class, 'pesanan_id', 'id');
    }
}
