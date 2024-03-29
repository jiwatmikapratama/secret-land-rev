<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'desas';

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'fk_id_kabupaten', 'id');
    }

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'fk_id_desa', 'id');
    }
}
