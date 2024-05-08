<?php

namespace App\Http\Controllers;

use App\Models\ingatlanok;
use App\Models\Ingatlanok as ModelsIngatlanok;
use App\Models\Kategoriak;
use Illuminate\Http\Request;

class IngatlanokController extends Controller
{

    public function index()
    {
        $ingatlanok = ingatlanok::with("kategoriak")->get();
        $kategoriak = Kategoriak::all();
        return view("ingatlanok.index", compact("ingatlanok", "kategoriak"));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategoria' => ['required'],
            'leiras' => ['required'],
            'hierdetesDatuma' => ['required'],
            'ar' => ['required'],
            'kepUrl' => ['required'],
        ]);

        ingatlanok::create([
            'kategoria' => $request->kategoria,
            'leiras' => $request->leiras,
            'hierdetesDatuma' => $request->hierdetesDatuma ?? now()->toDateString(),
            'tehermentes' => $request->has('tehermentes') ? 1 : 0,
            'ar' => $request->ar,
            'kepUrl' => $request->kepUrl
        ]);

        return redirect()->back()->with('success', 'Sikeresen létrehozva!');
    }

    public function show($id)
    {
        return ingatlanok::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ingatlanok $ingatlanok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ingatlanok $ingatlanok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ingatlanok $ingatlanok)
    {
        //
    }
}
