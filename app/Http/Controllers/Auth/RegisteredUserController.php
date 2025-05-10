<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Weapon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $weapons = Weapon::all(); // ここで武器一覧を取る！
        return view('auth.register', compact('weapons')); // そしてviewに渡す！
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'weapon_ids' => ['required', 'array', 'min:1', 'max:3'], // 1つ以上3つ以下
            'weapon_ids.*' => ['nullable', 'exists:weapons,id'],// 追加：武器IDが存在するか確認
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ここで武器を紐づけ！
        if ($request->filled('weapon_ids')) {
            // 空の値（""）を除外してから紐づけ
            $weaponIds = array_filter($request->weapon_ids, fn($id) => !empty($id));
            $user->weapons()->attach($weaponIds);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('matches.index', absolute: false));
    }
}
