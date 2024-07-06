<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sepatu'
        , 'hpp'
        , 'ukuran37'
        , 'ukuran38'
        , 'ukuran39'
        , 'ukuran40'
        , 'ukuran41'
        , 'ukuran41'
        , 'ukuran42'
        , 'ukuran43'
        , 'ukuran44'
    ];

    public function barangmasuk(){
        return $this->hasMany(Barangmasuk::class, 'nama_sepatu_id');
    }

    public function barangkeluar(){
        return $this->hasMany(Barangkeluar::class, 'nama_sepatu_id');
    }

}

