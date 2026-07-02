<x-app-layout>
    <x-slot name="header">
        Messages
    </x-slot>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-black text-gray-800 uppercase tracking-tight">Inbox</h3>
            <span class="text-[10px] font-bold text-brand-blue uppercase tracking-widest bg-blue-50 px-3 py-1 rounded-full">3 New Messages</span>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach($messages as $message)
                <div class="p-6 hover:bg-gray-50 transition-all cursor-pointer group flex items-start space-x-4">
                    <img src="{{ $message['avatar'] }}" class="w-12 h-12 rounded-full shadow-sm">
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-sm font-black text-gray-800">{{ $message['sender'] }}</h4>
                                <p class="text-xs font-bold text-brand-blue mt-0.5">{{ $message['subject'] }}</p>
                            </div>
                            <div class="text-right text-[9px] font-bold text-gray-400 uppercase">
                                {{ $message['date'] }}
                                @if($message['is_unread'])
                                    <div class="w-2 h-2 bg-brand-blue rounded-full ml-auto mt-1"></div>
                                @endif
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-1 leading-relaxed">
                            {{ $message['preview'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
