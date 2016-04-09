<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker = new \Faker\Generator();

        // add 50 users
//        for ($i = 0; $i <= 50; $i++) {
//            \App\Models\User::create([
//               "name" => $faker->name,
//               "email" => $faker->email,
//               "password" => $faker->password,
//               "" => $faker->password,
//            ]);
//        }

    }
}
