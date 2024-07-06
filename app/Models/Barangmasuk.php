<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sepatu_id'
        , 'type'
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
    public function stock(){
        return $this->belongsTo(Stock::class, 'nama_sepatu_id');
    }
}
