<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Games;
use App\Models\User_game;
use Illuminate\Database\Seeder;

class CreateDataGame extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo create user
        $users = array(
            'Riddle',
            'Hugh',
            'Kusa',
            'Bob',
            'Eagle',
            'Neko',
        );

        foreach ($users as $name) {
            User::create([
                'name' => $name,
            ]);
        }

        // demo create games

        $games = array(
            'Gunny',
            'Subway Suffers',
            'Flappy bird',
        );

        foreach ($games as $name) {
            Games::create([
                'name' => $name,
            ]);
        }

        // demo create game history

        $user_games = [
            [
                'user_id' => 1,
                'game_id' => 1,
                'score' => 10,
            ],
            [
                'user_id' => 2,
                'game_id' => 1,
                'score' => 20,
            ],
            [
                'user_id' => 3,
                'game_id' => 3,
                'score' => 50,
            ],
            [
                'user_id' => 5,
                'game_id' => 3,
                'score' => 40,
            ],
            [
                'user_id' => 1,
                'game_id' => 1,
                'score' => 100,
            ],
            [
                'user_id' => 6,
                'game_id' => 3,
                'score' => 80,
            ],
            [
                'user_id' => 2,
                'game_id' => 3,
                'score' => 10,
            ],
            [
                'user_id' => 4,
                'game_id' => 2,
                'score' => 90,
            ],
            [
                'user_id' => 1,
                'game_id' => 3,
                'score' => 60,
            ],
            [
                'user_id' => 3,
                'game_id' => 2,
                'score' => 30,
            ],
        ];

        foreach ($user_games as $data) {
            User_game::create($data);
        }

    }
}
