<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jawaban;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jawaban = [
            [
                'id' => '1',
                'name' => 'Sangat Baik',
                'icon' => 'bi-emoji-heart-eyes-fill',
                'skor' => '4',
            ],
            [
                'id' => '2',
                'name' => 'Baik',
                'icon' => 'bi-emoji-smile-fill',
                'skor' => '3',
            ],
            [
                'id' => '3',
                'name' => 'Kurang',
                'icon' => 'bi-emoji-neutral-fill',
                'skor' => '2',
            ],
            [
                'id' => '4',
                'name' => 'Buruk',
                'icon' => 'bi-emoji-angry-fill',
                'skor' => '1',
            ],
        ];

        Jawaban::insert($jawaban);
    }
}
