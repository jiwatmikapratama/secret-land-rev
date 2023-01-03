<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataDidaftarkan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'wisata_didaftarkans';

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'fk_id_desa', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'fk_id_wisata', 'id');
    }
}
