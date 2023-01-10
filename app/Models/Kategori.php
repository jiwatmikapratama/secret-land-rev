<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $guuarded = [];

    /**
     * Get all of the wisata for the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'fk_id_wisata', 'id');
    }
}
