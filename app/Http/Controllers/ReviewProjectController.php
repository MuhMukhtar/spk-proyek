<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use View;
use PDF;

class ReviewProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectNotReview = Project::where('project_is_review','0')->count();
        $projects = DB::table('projects')
            ->join('clients', 'projects.client_id', '=', 'clients.id')
            ->select('projects.*', 'clients.pt_name')
            ->where('project_is_review','0')
            ->get();
        return view('project.listReview', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Project::findOrFail($id);
        $client = Client::findOrFail($id->client_id);
        return view('project.reviewProject', compact('id', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);

        $project->project_duration = $request->get('project_duration');
        $project->project_cost = $request->get('project_cost');
        $project->project_load = $request->get('project_load');
        $project->project_difficult = $request->get('project_difficult');
        $project->project_is_review = $request->get('project_is_review');

        $project->save();
        return redirect()->route('reviewProject.index')->with('success','Project review successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
