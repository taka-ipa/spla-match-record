<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;
use App\Models\MatchResult;
use App\Models\Stage;
use App\Models\Rule;
use App\Models\Weapon;
use App\Models\Match;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MatchResultController extends Controller
{
    public function home()
    {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $matches = MatchResult::with(['rule', 'stage', 'weapon', 'user']) // user リレーションを eager load
            ->when($request->input('scope') == 'all', function ($query) {
                // 全てのユーザーのリザルトを表示
                return $query;
            }, function ($query) {
                // ログインしているユーザーのリザルトのみ表示 (デフォルト)
                return $query->where('user_id', auth()->id());
            })
            ->when($request->filled('rule'), function ($query) use ($request) {
                return $query->where('rule_id', $request->rule);
            })
            ->when($request->filled('stage'), function ($query) use ($request) {
                return $query->where('stage_id', $request->stage);
            })
            ->when($request->filled('weapon'), function ($query) use ($request) {
                return $query->where('weapon_id', $request->weapon);
            })
            ->when($request->filled('comment'), function ($query) use ($request) {
                return $query->where('comment', 'like', '%' . $request->comment . '%');
            })
            ->latest()
            ->paginate(10);

        $rules = Rule::all();
        $stages = Stage::all();
        $weapons = Weapon::all();

        return view('matches.index', compact('matches', 'rules', 'stages', 'weapons'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages = Stage::all();
        $rules = Rule::all();
        $weapons = auth()->user()->weapons;
        return view('matches.create', compact('stages', 'rules', 'weapons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // バリデーション（推奨）
    $request->validate([
        'stage' => 'required|exists:stages,id',
        'rule' => 'required|exists:rules,id',
        'weapon' => 'required|exists:weapons,id',
        'result' => 'required|in:win,lose',
        'comment' => 'nullable|string',
        'replay_code' => 'nullable|string|max:255',
    ]);

    $matchResult = new MatchResult();
    $matchResult->stage_id = $request->input('stage'); // フォームの name 属性 'stage' を使用
    $matchResult->rule_id = $request->input('rule');   // フォームの name 属性 'rule' を使用
    $matchResult->weapon_id = $request->input('weapon'); // フォームの name 属性 'weapon' を使用
    $matchResult->result = $request->input('result');
    $matchResult->comment = $request->input('comment');
    $matchResult->replay_code = $request->input('replay_code');
    $matchResult->user_id = auth()->id();

    $matchResult->save();

    return redirect()->route('matches.index')->with('success', '投稿が完了しました！');
}

    /**
     * Display the specified resource.
     */
    public function show(MatchResult $match)
    {
        return view('matches.show', compact('match'));
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
    public function destroy(MatchResult $match)
    {
        // 認可処理 (推奨)
        if (Auth::id() !== $match->user_id) {
            abort(403, 'このリザルトを削除する権限がありません。');
        }

        $match->delete();

        return redirect()->route('matches.index')->with('success', 'リザルトを削除しました。');
    }
}
