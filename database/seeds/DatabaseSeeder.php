<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 7) as $index) {
            DB::table('kategoris')->insert([
                'nama' => $faker->word(),
            ]);
        }
        foreach (range(1, 200) as $index) {
            DB::table('dokumens')->insert([
                'nama' => $faker->sentence(4),
                'kegiatan' => $faker->sentence(2),
                'unit' => $faker->word(),
                'status' => true,
                'id_kategori' => rand(1, 7),
            ]);
        }
    }
}
