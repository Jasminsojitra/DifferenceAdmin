<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user_count = count(User::role('player')->get());
        $categoreis = count(Category::all());
        $challenges = count(Challenge::all());
        $levels = count(Level::all());
        return view('dashboard',  compact('user_count','categoreis','levels','challenges'));
    }
}
