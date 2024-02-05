<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use App\Models\Perhitungan;
use App\Models\BobotKriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use View;
use PDF;
use Illuminate\Support\Str;

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
        // $truncated = Str::limit('The quick brown fox jumps over the lazy dog', 20);
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
    public function show($id)
    {
        $projects = Project::findOrFail($id);
        $clients = Client::findOrFail($projects->client_id);
        // $clients = DB::table('clients')
        // ->join('projects', 'projects.client_id', '=', 'clients.id')
        // ->select('projects.*', 'clients.pt_name')
        // ->get();
        // return response()->file($pathToFile);
        return view('project.showProject', compact('projects', 'clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Project::findOrFail($id);
        $client = Client::findOrFail($id->client_id);
        return view('project.editProject', compact('id', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $bobot = BobotKriteria::find(1);
        if ($request->hasFile('project_document')) {
            $project_document = $request->file('file');
            $fileName = $project_document->getClientOriginalName();
            $project_document->storeAs('public/project', $fileName);
            // Menghapus file lama jika ada
            Storage::delete('/storage/project/' . $project->project_document);
    
            // Mengunggah file baru
            $project_document = $request->file('project_document');
            $filename = $project_document->getClientOriginalName();
            $project_document->storeAs('public/project', $filename);
            $project->project_document = $filename;

            $project->project_document = $fileName;
        }

        $project->project_name = $request->get('project_name');
        $project->project_desc = $request->get('project_desc');
        $project->project_duration = $request->get('project_duration');
        $project->project_cost = $request->get('project_cost');
        $project->project_load = $request->get('project_load');
        $project->project_difficult = $request->get('project_difficult');
        

        $project->save();

        if ($project->project_is_review == 1) {
            $perhitungan = Perhitungan::where('project_id', $id)->first(); // Mencari perhitungan dengan project_id = $id
            // $perhitungan = new Perhitungan;
            // original
            $duration = $request->get('project_duration');
            $cost = $request->get('project_cost');
            $load = $request->get('project_load');
            $difficult = $request->get('project_difficult');

            $perhitungan->project_id = $id;
            $perhitungan->duration = $duration;
            $perhitungan->cost = $cost;
            $perhitungan->load = $load;
            $perhitungan->difficult = $difficult;

            // Skoring
                // Duration
                $duration_skor;
                if ($duration < 181) {
                    $duration_skor = 100;
                } elseif ($duration >= 181 and $duration <= 360) {
                    $duration_skor = 75;
                } elseif ($duration >= 361 and $duration <= 540) {
                    $duration_skor = 50;
                } elseif ($duration >= 541 and $duration <= 720) {
                    $duration_skor = 25;
                } elseif ($duration > 720) {
                    $duration_skor = 0;
                }
                $perhitungan->duration_skor = $duration_skor;

                // Cost
                $cost_skor;
                if ($cost < 300000000) {
                    $cost_skor = 100;
                } elseif ($cost >= 300000000 and $cost <= 449999999) {
                    $cost_skor = 80;
                } elseif ($cost >= 450000000 and $cost <= 599999999) {
                    $cost_skor = 60;
                } elseif ($cost >= 600000000 and $cost <= 749999999) {
                    $cost_skor = 40;
                } elseif ($cost >= 750000000 and $cost <= 899999999) {
                    $cost_skor = 20;
                } elseif ($cost > 900000000) {
                    $cost_skor = 0;
                }
                $perhitungan->cost_skor = $cost_skor;

                // Fabrication Load
                $load_skor;
                if ($load > 899) {
                    $load_skor = 100;
                } elseif ($load >= 800 and $load <= 899) {
                    $load_skor = 80;
                } elseif ($load >= 600 and $load <= 799) {
                    $load_skor = 60;
                } elseif ($load >= 400 and $load <= 599) {
                    $load_skor = 40;
                } elseif ($load >= 200 and $load <= 399) {
                    $load_skor = 20;
                } elseif ($load < 200) {
                    $load_skor = 0;
                }
                $perhitungan->load_skor = $load_skor;

                // Difficult
                $difficult_skor;
                if ($difficult == 1) {
                    $difficult_skor = 100;
                } elseif ($difficult == 2) {
                    $difficult_skor = 90;
                } elseif ($difficult == 3) {
                    $difficult_skor = 80;
                } elseif ($difficult == 4) {
                    $difficult_skor = 70;
                } elseif ($difficult == 5) {
                    $difficult_skor = 60;
                } elseif ($difficult == 6) {
                    $difficult_skor = 50;
                } elseif ($difficult == 7) {
                    $difficult_skor = 40;
                } elseif ($difficult == 8) {
                    $difficult_skor = 30;
                } elseif ($difficult == 9) {
                    $difficult_skor = 20;
                } elseif ($difficult == 10) {
                    $difficult_skor = 10;
                }
                $perhitungan->difficult_skor = $difficult_skor;
            
            // utility
            $cMax = MAX($duration_skor, $cost_skor, $load_skor, $difficult_skor); // Mencari C Max
            $cMin = MIN($duration_skor, $cost_skor, $load_skor, $difficult_skor); // Mencari C Min

            $duration_utility = 100 * (($duration_skor - $cMin) / ($cMax - $cMin)); // benefit
            $cost_utility = 100 * (($cMax - $cost_skor) / ($cMax - $cMin)); // cost
            $load_utility = 100 * (($cMax - $load_skor) / ($cMax - $cMin)); // cost
            $difficult_utility = 100 * (($difficult_skor - $cMin) / ($cMax - $cMin)); //benefit

            $perhitungan->duration_utility = number_format($duration_utility, 2, '.', '');
            $perhitungan->cost_utility = number_format($cost_utility, 2, '.', '');
            $perhitungan->load_utility = number_format($load_utility, 2, '.', '');
            $perhitungan->difficult_utility = number_format($difficult_utility, 2, '.', '');
            
            // utility x bobot
            // $bobot = BobotKriteria::find(1);
            // number_format($duration_ut_bobot, 2, '.', '');

            $duration_ut_bobot = $duration_utility * $bobot->bobot_duration;
            $cost_ut_bobot = $cost_utility * $bobot->bobot_cost;
            $load_ut_bobot = $load_utility * $bobot->bobot_load;
            $difficult_ut_bobot = $difficult_utility * $bobot->bobot_difficult;

            $perhitungan->duration_ut_bobot = number_format($duration_ut_bobot, 2, '.', '');
            $perhitungan->cost_ut_bobot = number_format($cost_ut_bobot, 2, '.', '');
            $perhitungan->load_ut_bobot = number_format($load_ut_bobot, 2, '.', '');
            $perhitungan->difficult_ut_bobot = number_format($difficult_ut_bobot, 2, '.', '');
            
            // Nlai akhir (SUM)
            $nilai_akhir = $duration_ut_bobot + $cost_ut_bobot + $load_ut_bobot + $difficult_ut_bobot;
            $perhitungan->nilai_akhir = number_format($nilai_akhir, 2, '.', '');;
            $perhitungan->save();

        }
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

    public function projectComplete(string $id)
    {
        $project = Project::find($id);
        $project->project_is_review = 2;
        $project->save();

        return redirect()->route('project.index')->with('success','Project edited successfully.');
    }
}