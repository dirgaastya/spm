<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
            $id = IdGenerator::generate(['table' => 'jenis_dokumens', 'field' => 'no', 'length' => 8, 'prefix' => 'JD-']);
            DB::table('jenis_dokumens')->insert([
                'no' => $id,
                'nama' => $faker->word(),
            ]);
        }
        foreach (range(1, 200) as $index) {
            $id = IdGenerator::generate(['table' => 'dokumens', 'field' => 'no', 'length' => 8, 'prefix' => 'DOK-']);
            DB::table('dokumens')->insert([
                'no' => $id,
                'nama' => $faker->sentence(4),
                'nama_file' => $faker->sentence(4),
                'kegiatan' => $faker->sentence(2),
                'unit' => $faker->word(),
                'status' => true,
                'no_jenis_dokumen' => 'JD-00001',
            ]);
        }
    }
}
