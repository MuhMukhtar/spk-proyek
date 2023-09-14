<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perhitungan;
use App\Models\Project;
use App\Models\Client;
use App\Models\BobotKriteria;
use Illuminate\Support\Facades\DB;


class PerhitunganController extends Controller
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
        $count = Perhitungan::count();
        if ($count > 0) {
            $bobot = BobotKriteria::find(1);
            // $bobotDuration = $bobot->duration;
            // Tabel memiliki data, tampilkan data atau lakukan operasi lain
            $perhitungan = DB::table('perhitungans')
            ->join('projects', 'perhitungans.project_id', '=', 'projects.id')
            ->join('clients', 'projects.client_id', '=', 'clients.id')
            ->select('perhitungans.*', 'projects.project_name', 'clients.pt_name')
            ->get();
            return view('perhitungan.perhitungan', compact('perhitungan', 'bobot'));
            // return view('project.listReview', compact('projects'));
        } else {
            // Tabel tidak memiliki data, tampilkan pesan
            return view('project.noData');
        }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
