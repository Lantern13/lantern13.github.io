<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PerjalananModel::factory(100)->create();
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 120; $i++) {

            // insert data ke table perjalanan menggunakan Faker
            DB::table('perjalanan_models')->insert([
                'user_id' => User::all()->random()->id,
                'tanggal' => $faker->date('Y-m-d'),
                'waktu' => $faker->time,
                'lokasi' => $faker->City,
                'suhu' => $faker->numberBetween(32, 40)
            ]);

            DB::table('users')->insert([
                'nama' => 'admin',
                'nik' => 'admin',
                'lokasi' => $faker->City,
                'suhu' => $faker->numberBetween(32, 40)
            ]);

        }
    }
}
