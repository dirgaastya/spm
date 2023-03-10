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
        foreach (range(1, 50) as $index) {
            $id = IdGenerator::generate(['table' => 'dokumens', 'field' => 'no', 'length' => 8, 'prefix' => 'DOK-']);
            DB::table('dokumens')->insert([
                'no' => $id,
                'nama_file' => $faker->word(),
                'nama' => $faker->word(),
                'no_jenis_dokumen' => 'JD-00002',
                'no_kegiatan' => 'KG-00005',
                'no_unit' => 'UN-00003',
                'status' => '1'
            ]);
        }
    }
}
