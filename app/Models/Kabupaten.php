<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kabupatens';

    public function desa()
    {
        return $this->hasMany(Desa::class, 'fk_id_kabupaten', 'id');
    }
}
