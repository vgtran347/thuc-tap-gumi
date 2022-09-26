<?php

namespace App\Http\Controllers;

use App\Models\Games;

class HomeController extends Controller
{
    //
    public function index()
    {

        $d1 = $this->FunctionTest1();
        $d2 = $this->FunctionTest2();
        $d3 = $this->FunctionTest3();
        return view('welcome', ['d1' => $d1, 'd2' => $d2, 'd3' => $d3]);

    }

    // Đề 1
    protected function FunctionTest1()
    {
        // data
        $array = [
            [
                'id' => 1,
                'interviewer' => 'Riddle',
                'interviewee' => 'Larry',
                'skill' => 'PHP',
                'date' => '2021/01/01',
            ],
            [
                'id' => 2,
                'interviewer' => 'Hugh',
                'interviewee' => 'Kuro',
                'skill' => 'ReactJs',
                'date' => '2021/01/02',
            ],
            [
                'id' => 3,
                'interviewer' => 'Hugh',
                'interviewee' => 'Kusa',
                'skill' => 'PHP',
                'date' => '2021/01/03',
            ],
            [
                'id' => 4,
                'interviewer' => 'Riddle',
                'interviewee' => 'Fuku',
                'skill' => 'PHP',
                'date' => '2021/01/01',
            ],
            [
                'id' => 5,
                'interviewer' => 'Hugh',
                'interviewee' => 'Kevin',
                'skill' => 'PHP',
                'date' => '2021/01/03',
            ],
            [
                'id' => 6,
                'interviewer' => 'Will',
                'interviewee' => 'Neko',
                'skill' => 'Ruby',
                'date' => '2021/01/01',
            ],
        ];

        // sort
        $sortedArr = collect($array)
            ->groupBy(['date', 'skill']) // group date and skill
            ->sortBy('date')
            ->toArray();
        return $sortedArr;
    }

    // Đề 2
    protected function FunctionTest2()
    {
        // data
        $array = [1, 2, 5, 15, 9, 10, 20];
        $array1 = [5, 12, 1, 10, 9, 11, 3, 8];

        $merge = collect($array)->merge($array1); //  merge 2 array
        $intersect = collect($array)->intersect($array1); // get array value duplicate
        $filter = collect($merge)->diff($intersect)->toArray();
        return $filter;
    }

    protected function FunctionTest3()
    {
        // $data = Games::with(['top' => function ($query) {
        //     $query->select(DB::raw('max(score) as score'), 'game_id', 'user_id')
        //         ->groupBy('user_game.game_id', 'user_game.user_id');
        // }])->get()->toArray();
        // return $data;

        $data = Games::join('user_game', function ($join) {
            $join->on('games.id', '=', 'user_game.game_id');
        })
        ->join('users', function ($join) {
            $join->on('users.id', '=', 'user_game.user_id');
        })
        ->get()->toArray();

        return $data;
    }

}
