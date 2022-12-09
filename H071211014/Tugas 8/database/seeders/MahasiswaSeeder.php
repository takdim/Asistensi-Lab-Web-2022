<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 1000; $i++){
            Mahasiswa::create([
                'nim' => $faker->unique()->bothify('?0########'),
                'nama' => $faker->name(),
                'alamat' => $faker->address(),
                'fakultas' => $faker->randomElement([
                    'Matematika dan Ilmu Pengetahuan Alam',
                    'Hukum',
                    'Kedokteran',
                    'Kedokteran Gigi',
                    'Ekonomi dan Bisnis',
                    'Kesehatan Masyarakat',
                    'Ilmu Kelautan dan Perikanan',
                    'Ilmu Sosial dan Politik',
                    'Kehutanan',
                    'Peternakan',
                    'Ilmu Budaya',
                    'Teknik',
                    'Pertanian',
                    'Kesehatan Masyarakat',
                    'Keperawatan',
                    'Farmasi'
                ]),
            ]);
        }
    }
}
