<?php

use App\Entries;
use Faker\Factory;
use Illuminate\Database\Seeder;

class add_entries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Entries::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'message' => $faker->text,
            ]);
        }
    }
}
