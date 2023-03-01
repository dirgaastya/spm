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
        foreach (range(1, 7) as $index) {
            $id = IdGenerator::generate(['table' => 'kegiatans', 'field' => 'no', 'length' => 8, 'prefix' => 'JD-']);
            DB::table('kegiatans')->insert([
                'no' => $id,
                'nama' => $faker->word(),
            ]);
        }
        foreach (range(1, 7) as $index) {
            $id = IdGenerator::generate(['table' => 'units', 'field' => 'no', 'length' => 8, 'prefix' => 'JD-']);
            DB::table('units')->insert([
                'no' => $id,
                'nama' => $faker->word(),
            ]);
        }
    }
}
