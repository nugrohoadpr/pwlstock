<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'nama_sepatu_id',
        'jenis_keluar',
        'link',
        'hargajual',
        'ukuran37',
        'ukuran38',
        'ukuran39',
        'ukuran40',
        'ukuran41',
        'ukuran42',
        'ukuran43',
        'ukuran44',
        'profit'
    ];

    public function stock(){
        return $this->belongsTo(Stock::class, 'nama_sepatu_id');
    }
}
