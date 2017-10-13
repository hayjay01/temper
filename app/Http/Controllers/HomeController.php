<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRetention;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserRetention::getStatistics();
        $series = [];
        $onboarding_steps = [0, 20, 40, 50,70, 90, 99, 100];

        foreach ($data as $week) {

            $series[$week['week']]['name'] = "week ".$week['week'];

            if(in_array($week['onboarding_percentage'], $onboarding_steps)){
                $step = array_search($week['onboarding_percentage'], ($onboarding_steps));

                $series[$week['week']]['data'][$step] = !is_null($week['users_percentage'])? floatval($week['users_percentage']): 0;
            }

            foreach ($onboarding_steps as $index => $step) {

                if(!isset($series[$week['week']]['data'][$index])){
                    $series[$week['week']]['data'][$index] = 0;
                }
            }

            $series[$week['week']]['data'] = array_values($series[$week['week']]['data']);

        }

        $series = array_values($series);

        return view('home', compact('series'));
    }
}
