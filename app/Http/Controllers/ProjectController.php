<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
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
        // $projects = Project::all();
        $projects = DB::table('projects')
            ->join('clients', 'projects.client_id', '=', 'clients.id')
            ->select('projects.*', 'clients.pt_name')
            ->get();
        return view('project.project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients= Client::all();
        return view('project.createProject', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'project_name' => 'required',
            'project_desc' => 'required',
            'project_duration' => 'required',
            'project_cost' => 'required',
            'project_document' => 'file',
        ]);

        $project_document = $request->file('file');
        $fileName = $project_document->getClientOriginalName();
        $project_document->storeAs('public/project', $fileName);

        $project = new Project;
        $project->client_id = $request->get('client_id');
        $project->project_name = $request->get('project_name');
        $project->project_desc = $request->get('project_desc');
        $project->project_duration = $request->get('project_duration');
        $project->project_cost = $request->get('project_cost');
        $project->project_document = $fileName;

        $project->save();
        return redirect()->route('project.index')->with('success','Project created successfully.');

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
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.editProject', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->project_name = $request->get('project_name');
        $project->project_desc = $request->get('project_desc');
        $project->project_duration = $request->get('project_duration');
        $project->project_cost = $request->get('project_cost');

        if ($request->hasFile('project_document')) {
            // Menghapus file lama jika ada
            Storage::delete('public/project/' . $project->project_document);
    
            // Mengunggah file baru
            $project_document = $request->file('project_document');
            $filename = $project_document->getClientOriginalName();
            $project_document->storeAs('public/project', $filename);
            $project->project_document = $filename;
        }

        $project->save();
        return redirect()->route('project.index')->with('success','Project edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        // Storage::delete('public/project/' . $project->project_document);
        if ($project->project_document != null) {
            // Menghapus file jika ada
            Storage::delete('public/project/' . $project->project_document);
        }
        $project->delete();

        return redirect()->back();
    }
}
