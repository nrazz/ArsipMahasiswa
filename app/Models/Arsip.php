<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    // protected $table ="arsipmahasiswa";
    protected $table ="arsipmahasiswa";
    protected $primaryKey ="nomor_surat";
    protected $keyType = "string";
    protected $fillable = ['nomor_surat','nama_kategori','judul', 'berkas'];

    public function kategorii()
    {
        return $this->belongsTo(Kategori::class, 'nama_kategori', 'id');
    }
    }
