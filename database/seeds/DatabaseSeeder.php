<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            $rand = rand(1, 10);
            DB::table('uzsakymai')->insert([
                'vardas' => $faker->firstName,
                'pavarde' => $faker->lastName,
                'telefonas' => $faker->phoneNumber,
                'elpastas' => $faker->email,
                'kiekis' => $rand,
                'suma' => $rand * 29.95,
                'miestas' => $faker->city,
                'adresas' => $faker->streetAddress,
                'pristatymas' => "Atsiimti artimiausiame pašto skyriuje",
                'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                'updated_at' => (new \DateTime())->format('Y-m-d H:i:s')
            ]);
        }
    }
}
