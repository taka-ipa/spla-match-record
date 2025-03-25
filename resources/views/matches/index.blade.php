<x-app-layout>
<body class="bg-gray-100 p-6">
    @foreach ($matches as $match)
        <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex items-start">
            <div class="flex-shrink-0">
                <!-- Result badge -->
                <span class="text-white 
                            {{ $match->result == 'win' ? 'bg-green-500' : 'bg-red-500' }} 
                            px-2 py-1 rounded-full text-xs font-bold">
                    {{ $match->result == 'win' ? '勝利' : '敗北' }}
                </span>
            </div>
            <div class="ml-4 flex-1">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold">{{ $match->stage->name }}</h3>
                    <span class="text-sm text-gray-500">{{ $match->created_at->format('Y/m/d H:i') }}</span>
                </div>
                <p class="text-sm text-gray-600 mt-1">ルール: {{ $match->rule->name }}</p>
                <p class="text-sm text-gray-600 mt-1">ステージ: {{ $match->stage->name }}</p>
                <p class="text-sm text-gray-600 mt-1">武器: {{ $match->weapon->name }}</p>
                <p class="text-sm text-gray-600 mt-1">コメント: {{ $match->comment }}</p>
                <div class="mt-4 flex items-center">
                    <img src="{{ $match->stage->image_path }}" alt="{{ $match->stage->name }}" class="w-16 h-16 rounded-md object-cover">
                    <div class="ml-4 text-sm text-gray-500">
                        <!-- <p>ステージ画像</p> -->
                        <!-- <p>{{ $match->weapon->name }}</p> -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>
</x-app-layout>

