<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ログイン名')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス（任意）')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="text"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード（確認用）')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label>よく使う武器を３つ選んでください</label>

            <!-- 1つ目の武器 -->
            <select name="weapon_ids[]" class="block mt-2 w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">武器を選択</option>
                @foreach ($weapons as $weapon)
                    <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
                @endforeach
            </select>

            <!-- 2つ目の武器 -->
            <select name="weapon_ids[]" class="block mt-2 w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">武器を選択</option>
                @foreach ($weapons as $weapon)
                    <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
                @endforeach
            </select>

            <!-- 3つ目の武器 -->
            <select name="weapon_ids[]" class="block mt-2 w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">武器を選択</option>
                @foreach ($weapons as $weapon)
                    <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('ログイン') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('ユーザー登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
