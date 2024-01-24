<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin Pendaftaran',
                'username' => 'pendaftaran',
                'email' => 'pendaftaran@rsqadr.com',
                'role' => 'admin-pendaftaran',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@rsqadr.com',
                'role' => 'superadmin',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin Farmasi',
                'username' => 'farmasi',
                'email' => 'farmasi@rsqdr.com',
                'role' => 'admin-farmasi',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin Poliklinik',
                'username' => 'poliklinik',
                'email' => 'poli@rsqadr.com',
                'role' => 'admin-poliklinik',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin IGD',
                'username' => 'IGD',
                'email' => 'igd-Lab@rsqadr.com',
                'role' => 'admin-IGD',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin Radiologi',
                'username' => 'radiologi',
                'email' => 'radiologi@rsqadr.com',
                'role' => 'admin-radiologi',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin Kasir',
                'username' => 'kasir',
                'email' => 'kasir@rsqadr.com',
                'role' => 'admin-kasir',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin Fisiotherapy',
                'username' => 'fisiotherapy',
                'email' => 'fisiotherapy@rsqadr.com',
                'role' => 'admin-fisiotherapy',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin Ruang Perawatan',
                'username' => 'ruangperawatan',
                'email' => 'ruangperawatan@rsqadr.com',
                'role' => 'admin-ruang-perawatan',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin ICU',
                'username' => 'ICU',
                'email' => 'ICU@rsqadr.com',
                'role' => 'admin-ICU',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Admin HD',
                'username' => 'HD',
                'email' => 'HD@rsqadr.com',
                'role' => 'admin-HD',
                'password' => bcrypt('12345678'),
            ]

        ];

        User::insert($user);
    }
}
