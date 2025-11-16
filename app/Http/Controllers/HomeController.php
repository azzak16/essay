<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Hero;
use App\Models\Layanan;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activity = Activity::latest()->take(4)->get();

        $team = Team::latest()->take(3)->get();

        $layanan = Layanan::latest()->take(6)->get();
        $hero = Hero::latest()->take(3)->get();

        return view('welcome', compact('activity', 'team', 'layanan', 'hero'));
    }
}
