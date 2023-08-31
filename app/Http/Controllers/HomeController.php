<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientCount = Client::count();
        $projectCount = Project::count();
        $projectReview = Project::where('project_is_review','1')->count();
        $projectNotReview = Project::where('project_is_review','0')->count();
        return view('home', compact('clientCount', 'projectCount', 'projectReview', 'projectNotReview'));
    }
}
