<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupatens = [
            [
                'nama' => 'Denpasar',
            ],
            [
                'nama' => 'Buleleng',
            ],
            [
                'nama' => 'Bangli',
            ],
            [
                'nama' => 'Karangasem',
            ],
            [
                'nama' => 'Gianyar',

            ],
            [
                'nama' => 'Tabanan',

            ],
            [
                'nama' => 'Badung',

            ],
            [
                'nama' => 'Klungkung',

            ],
            [
                'nama' => 'Jembrana',

            ],

        ];

        \DB::table('kabupatens')->insert($kabupatens);
    }
}
