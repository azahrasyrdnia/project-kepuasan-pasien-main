<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bagian;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bagian = [
            [
                'name' => 'Pendaftaran',
                'role' => 'admin-pendaftaran'

            ],
            [
                'name' => 'Farmasi',
                'role' => 'admin-farmasi'
            ],
            [
                'name' => 'Poliklinik',
                'role' => 'admin-poliklinik'
            ],
            [
                'name' => 'Kasir',
                'role' => 'admin-kasir'
            ],
            [
                'name' => 'IGD',
                'role' => 'admin-IGD'
            ],
            [
                'name' => 'Radiologi',
                'role' => 'admin-radiologi'
            ],
            [
                'name' => 'Laboratorium',
                'role' => 'admin-laboratorium'
            ],
            [
                'name' => 'Fisiotherapy',
                'role' => 'admin-fisiotherapy'
            ],
            [
                'name' => 'Ruang Perawatan',
                'role' => 'admin-ruang-perawatan'
            ],
            [
                'name' => 'ICU',
                'role' => 'admin-ICU'
            ],
            [
                'name' => 'HD',
                'role' => 'admin-HD'
            ]
            


        ];

        Bagian::insert($bagian);
    }
}
