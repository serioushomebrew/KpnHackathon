<?php

use Illuminate\Database\Seeder;

class EverythingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // dont mind the dumped providers, i cba to find out which ones are required
        // @TODO: nice to clean this up when we have time
        $faker = new \Faker\Generator();
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\Address($faker));
        $faker->addProvider(new Faker\Provider\Person($faker));
        $faker->addProvider(new Faker\Provider\Base($faker));
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\en_US\Company($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        // add 4 buildings
        \App\Models\Building::unguard();
        for ($i = 1; $i <= 4; $i++) {
            \App\Models\Building::create([
                "address" => $faker->address,
                "place" => $faker->city,
                "floor_levels" => rand(1, 6),
                "region" => $faker->word
            ]);
        }

        // add floors for all the buildings
        \App\Models\Floor::unguard();
        foreach (\App\Models\Building::all() as $building) {
            for ($i = 0; $i <= $building->floor_levels; $i++) {
                \App\Models\Floor::create([
                    "level" => $i,
                    "title" => $faker->word,
                    "description" => $faker->text(200),
                    "building_id" => $building->id
                ]);
            }
        }
        \App\Models\Building::reguard();

        // add 6 rooms and make 1 special for each floor
        \App\Models\Room::unguard();
        \App\Models\SpecialRoom::unguard();
        foreach (\App\Models\Floor::all() as $floor) {
            for ($i = 1; $i <= 6; $i++) {
                if($i == 1) {
                    $specRoom = \App\Models\SpecialRoom::create([
                        "action" => "insertRecognizableActionHere"  // @TODO: remember to manually insert actions
                    ]);
                    \App\Models\Room::create([
                        "order" => $i,
                        "category" => $faker->word,
                        "description" => $faker->text(200),
                        "title" => $faker->word,
                        "max_users" => 6,
                        "floor_id" => $floor->id,
                        "is_specialroom" => $specRoom
                    ]);
                }
                \App\Models\Room::create([
                    "order" => $i,
                    "category" => $faker->word,
                    "description" => $faker->text(200),
                    "title" => $faker->word,
                    "max_users" => rand(2, 5),
                    "floor_id" => $floor->id
                ]);
            }
        }
        \App\Models\Room::reguard();
        \App\Models\SpecialRoom::reguard();
        \App\Models\Floor::reguard();

        // add 50 users
        \App\Models\User::unguard();
        for ($i = 1; $i <= 50; $i++) {
            \App\Models\User::create([
                "name" => $faker->name,
                "function" => $faker->word,
                "room_id" => \App\Models\Room::where(["id" => $i])->get(["id"]),
                "description" => $faker->text(200),
                "image" => "/img/avatars/" . $i,
                "image_thumb" => "/img/avatar_thumbs/" . $i,
                "active" => 1
            ]);
        }
        \App\Models\User::reguard();

        // add 3 skills for each user with corresponding UserSkills rows
        \App\Models\Skill::unguard();
        \App\Models\UserSkill::unguard();
        foreach (\App\Models\User::all() as $user) {
            for ($i = 1; $i <= 3 ; $i++) {
                $skillId = \App\Models\Skill::create([
                    "title" => $faker->word,
                    "description" => $faker->text(200),
                ]);
                \App\Models\UserSkill::create([
                    "user_id" => $user->id,
                    "skill_id" => $skillId,
                ]);
            }
        }
        \App\Models\UserSkill::reguard();
        \App\Models\Skill::reguard();

    }
}
