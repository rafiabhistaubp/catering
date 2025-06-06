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
<<<<<<< HEAD
    protected $fillable = ['deskripsi','nama_makanan', 'untuk_tanggal', 'porsi', 'shift', 'foto'];
=======
    protected $fillable = ['deskripsi', 'untuk_tanggal', 'porsi', 'shift'];
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83

    // Jika kolom primary key bukan 'id' dan menggunakan auto-increment, tentukan sebagai berikut
    protected $keyType = 'int';
    public $incrementing = true;
}
