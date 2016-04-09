<?php

use Illuminate\Database\Seeder;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;
use App\Models\SpecialRoom;
use App\Models\User;
use App\Models\Skill;
use App\Models\UserSkill;
class EverythingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->truncate();
        DB::table('floors')->truncate();
        DB::table('rooms')->truncate();



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
        Building::unguard();

        Building::create([
            "place" => 'Groningen',
            "floor_levels" => rand(1, 6),
            "address" => $faker->address,
            "region" => $faker->word
        ]);

        Building::create([
            "place" => 'Zwolle',
            "floor_levels" => rand(1, 6),
            "address" => $faker->address,
            "region" => $faker->word
        ]);

        Building::create([
            "place" => 'Amsterdam',
            "floor_levels" => rand(1, 6),
            "address" => $faker->address,
            "region" => $faker->word
        ]);

        Building::create([
            "place" => 'Rotterdam',
            "floor_levels" => rand(1, 6),
            "address" => $faker->address,
            "region" => $faker->word
        ]);


        // add floors for all the buildings
        Floor::unguard();
        foreach (Building::all() as $building) {
            for ($i = 0; $i <= $building->floor_levels; $i++) {
                Floor::create([
                    "level" => $i,
                    "title" => $faker->word,
                    "description" => $faker->text(200),
                    "building_id" => $building->id
                ]);
            }
        }
        Building::reguard();

        // add 6 rooms and make 1 special for each floor
        Room::unguard();
        SpecialRoom::unguard();
        foreach (Floor::all() as $floor) {
            for ($i = 1; $i <= 6; $i++) {
                if($i == 1) {
                    $specRoom = SpecialRoom::create([
                        "action" => "insertRecognizableActionHere"  // @TODO: remember to manually insert actions
                    ]);
                    Room::create([
                        "order" => $i,
                        "category" => $faker->word,
                        "description" => $faker->text(200),
                        "title" => $faker->word,
                        "max_users" => 6,
                        "floor_id" => $floor->id,
                        "is_specialroom" => $specRoom
                    ]);
                }
                Room::create([
                    "order" => $i,
                    "category" => $faker->word,
                    "description" => $faker->text(200),
                    "title" => $faker->word,
                    "max_users" => rand(2, 5),
                    "floor_id" => $floor->id
                ]);
            }
        }
        Room::reguard();
        SpecialRoom::reguard();
        Floor::reguard();

        // add 50 users
        User::unguard();
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                "name" => $faker->name,
                "function" => $faker->word,
                "room_id" => Room::where(["id" => $i])->get(["id"]),
                "description" => $faker->text(200),
                "image" => "/img/avatars/" . $i,
                "image_thumb" => "/img/avatar_thumbs/" . $i,
                "active" => 1
            ]);
        }
       User::reguard();

        // add 3 skills for each user with corresponding UserSkills rows
        Skill::unguard();
        UserSkill::unguard();
        foreach (User::all() as $user) {
            for ($i = 1; $i <= 3 ; $i++) {
                $skillId = Skill::create([
                    "title" => $faker->word,
                    "description" => $faker->text(200),
                ]);
                UserSkill::create([
                    "user_id" => $user->id,
                    "skill_id" => $skillId,
                ]);
            }
        }
        UserSkill::reguard();
        Skill::reguard();

    }
}
