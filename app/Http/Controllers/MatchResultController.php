<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;
use App\Models\MatchResult;
use App\Models\Stage;
use App\Models\Rule;
use App\Models\Weapon;
use App\Models\Match;

class MatchResultController extends Controller
{
    public function home()
    {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = MatchResult::with(['stage', 'rule', 'weapon'])->latest()->get();
        return view('matches.index', compact('matches'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages = Stage::all();
        $rules = Rule::all();
        $weapons = Weapon::all();
        return view('matches.create', compact('stages', 'rules', 'weapons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all()); // フォームデータを表示
        $validated = $request->validate([
            'stage_id' => 'required|exists:stages,id',
            'rule_id' => 'required|exists:rules,id',
            'weapon_id' => 'required|exists:weapons,id',
        ]);
        $matchResult = new MatchResult();
        $matchResult->stage_id = $validated['stage_id'];
        $matchResult->rule_id = $validated['rule_id'];
        $matchResult->weapon_id = $validated['weapon_id'];
        $matchResult->result = $request->input('result'); // Assuming you have a result field in your form
        $matchResult->replay_code = $request->input('replay_code');
        $matchResult->comment = $request->input('comment');
        $matchResult->user_id = auth()->id(); // Assuming you have user authentication  
    
        $matchResult->save();
        return redirect()->route('matches.index')->with('success', 'Match result created successfully.');
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
