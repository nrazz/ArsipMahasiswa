<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table ="category";
    protected $primaryKey ="id";
    protected $keyType = "string";
    protected $fillable = ['id','nama_kategori','keterangan'];

    public function arsip(){
        return $this->hasMany(Arsip::class, 'id');
        
    }
    public $incrementing = true;
    }