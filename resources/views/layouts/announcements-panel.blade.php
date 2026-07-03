<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-black text-gray-800 uppercase tracking-tight">Announcements</h2>
        <button @click="announcementsOpen = false" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <style>
        @keyframes popIn {
            0% { transform: scale(0.9); opacity: 0; }
            70% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .announcement-item {
            animation: popIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            opacity: 0;
        }
    </style>

    <div class="space-y-4">
        @php
            $announcements = [
                [
                    'title' => 'Enrollment for SY 2025-2026',
                    'date' => 'July 01, 2025',
                    'type' => 'URGENT',
                    'color' => 'red',
                    'content' => 'Official enrollment for the upcoming school year starts this coming Monday.'
                ],
                [
                    'title' => 'New LMS Features',
                    'date' => 'June 28, 2025',
                    'type' => 'UPDATE',
                    'color' => 'blue',
                    'content' => 'We have integrated the new Calendar and Announcement panels for better navigation.'
                ],
                [
                    'title' => 'Holiday Notice',
                    'date' => 'June 12, 2025',
                    'type' => 'INFO',
                    'color' => 'teal',
                    'content' => 'Classes are suspended in observance of Independence Day.'
                ],
                [
                    'title' => 'Webinar: Modern Laravel',
                    'date' => 'June 10, 2025',
                    'type' => 'EVENT',
                    'color' => 'purple',
                    'content' => 'Join our upcoming webinar on Laravel best practices for graduating students.'
                ]
            ];
        @endphp

        @foreach($announcements as $index => $item)
            <div
                class="announcement-item bg-white border border-gray-100 p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow"
                style="animation-delay: {{ ($index + 1) * 150 }}ms"
            >
                <div class="flex justify-between items-start mb-2">
                    <span class="text-[8px] font-black px-2 py-0.5 rounded-full bg-{{ $item['color'] }}-100 text-{{ $item['color'] }}-600 uppercase tracking-widest">
                        {{ $item['type'] }}
                    </span>
                    <span class="text-[9px] font-bold text-gray-400 uppercase">{{ $item['date'] }}</span>
                </div>
                <h3 class="text-xs font-black text-gray-800 mb-1">{{ $item['title'] }}</h3>
                <p class="text-[10px] text-gray-500 font-medium leading-relaxed">
                    {{ $item['content'] }}
                </p>
                <div class="mt-3 flex justify-end">
                    <a href="{{ route('announcements.index') }}" class="text-[9px] font-black text-brand-blue uppercase hover:underline">Read more</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
