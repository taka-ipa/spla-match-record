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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequest $request)
    {
        // $path = $request->file('stage')->store('stages', 'public');

        // Match::create([
        //     'stage' => $path,
        //     'rule' => $request->rule,
        //     'weapon' => $request->weapon,
        //     'result' => $request->result,
        //     'comment' => $request->comment,
        //     'user_id' => auth()->id(),
        // ]);

        // return redirect()->route('matches.index')->with('success', '試合を投稿しました！');
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
