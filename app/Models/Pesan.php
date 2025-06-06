<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    // Menentukan nama tabel yang sesuai jika berbeda dengan default (plural)
    protected $table = 'pesanan';

    // Menentukan primary key jika menggunakan selain default (id)
    protected $primaryKey = 'id';

    // Menonaktifkan penggunaan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false; // Set to false if not using created_at and updated_at columns

    // Menentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = ['deskripsi','nama_makanan', 'untuk_tanggal', 'porsi', 'shift', 'foto'];

    // Jika kolom primary key bukan 'id' dan menggunakan auto-increment, tentukan sebagai berikut
    protected $keyType = 'int';
    public $incrementing = true;
}
