<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            [
                'nama' => 'Pantai'
            ],
            [
                'nama' => 'Gunung'
            ],
            [
                'nama' => 'Alam'
            ],
            [
                'nama' => 'Buatan'
            ],
            [
                'nama' => 'Kuliner'
            ],
            [
                'nama' => 'Hidden'
            ],
        ];
        \DB::table('kategoris')->insert($kategoris);
    }
}
