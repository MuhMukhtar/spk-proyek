<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BobotKriteria;
use App\Models\Perhitungan;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Log;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('perhitungan.bobot');
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
        $id = BobotKriteria::where('id', $id)->first();
        return view('perhitungan.bobot', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bobot = BobotKriteria::find(1);
        $newDuration = $request->get('duration');
        $newCost = $request->get('cost');
        $newLoad = $request->get('load');
        $newDifficult = $request->get('difficult');
        $total = $newDuration + $newCost + $newLoad + $newDifficult;

        if ($total == 1) {
            $bobot->bobot_duration = $newDuration;
            $bobot->bobot_cost = $newCost;
            $bobot->bobot_load = $newLoad;
            $bobot->bobot_difficult = $newDifficult;
            $bobot->save();
        

            $perhitungan = Perhitungan::all();
            
            foreach ($perhitungan as $d) {
                $duration_ut_bobot = $d->duration_utility * $newDuration;
                $cost_ut_bobot = $d->cost_utility * $newCost;
                $load_ut_bobot = $d->load_utility * $newLoad;
                $difficult_ut_bobot = $d->difficult_utility * $newDifficult;

                $d->duration_ut_bobot = number_format($duration_ut_bobot, 2, '.', '');
                $d->cost_ut_bobot = number_format($cost_ut_bobot, 2, '.', '');
                $d->load_ut_bobot = number_format($load_ut_bobot, 2, '.', '');
                $d->difficult_ut_bobot = number_format($difficult_ut_bobot, 2, '.', '');
                
                // Nlai akhir (SUM)
                $nilai_akhir = $duration_ut_bobot + $cost_ut_bobot + $load_ut_bobot + $difficult_ut_bobot;
                $d->nilai_akhir = number_format($nilai_akhir, 2, '.', '');;
                $d->save();
            }

            return redirect()->route('perhitungan.index');
        } else {
            return redirect()->back()->with(['alert' => 'JUMLAH BOBOT MAKSIMAL BERNILAI 1.00']);
            // return redirect()->back();
            // return redirect()->back()->with('alert', 'JUMLAH BOBOT TIDAK BOLEH LEBIH DARI 1');
            // $message = "wrong answer";
            // echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
