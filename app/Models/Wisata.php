<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'objek_wisatas';

    protected $casts = [
        'gambar' => 'array'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'fk_id_desa', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'fk_id_kategori', 'id');
    }
}
