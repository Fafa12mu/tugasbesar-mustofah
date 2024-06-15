<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=1;$i<=100;$i++){
            DB::table('barang')->insert([
                'kdbarang' => $faker->unique()->bothify('BRG###'),
                'namabrg' => $faker->words(3, true),
                'hrgbrg' => $faker->numberBetween(1000, 1000000),
                'stckbrg' => $faker->numberBetween(1, 100),
                'gmbrbarang' => $faker->imageUrl(640, 480, 'technics', true, 'Faker', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
