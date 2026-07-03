<x-app-layout>
    <x-slot name="header">
        Campus Announcements
    </x-slot>

    <div class="max-w-7xl">
        <!-- Dashboard Blobs for Announcements -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-black text-red-500 uppercase tracking-widest mb-1">Urgent</p>
                <h3 class="text-2xl font-black text-gray-800">1</h3>
                <p class="text-[10px] font-bold text-gray-400 uppercase mt-1">Pending Actions</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-black text-blue-500 uppercase tracking-widest mb-1">Events</p>
                <h3 class="text-2xl font-black text-gray-800">12</h3>
                <p class="text-[10px] font-bold text-gray-400 uppercase mt-1">This Month</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-black text-green-500 uppercase tracking-widest mb-1">Reach</p>
                <h3 class="text-2xl font-black text-gray-800">98%</h3>
                <p class="text-[10px] font-bold text-gray-400 uppercase mt-1">Student View Rate</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <p class="text-[10px] font-black text-purple-500 uppercase tracking-widest mb-1">Total</p>
                <h3 class="text-2xl font-black text-gray-800">45</h3>
                <p class="text-[10px] font-bold text-gray-400 uppercase mt-1">Active Posts</p>
            </div>
        </div>

        <!-- Main Announcement List -->
        <div class="space-y-6">
            @php
                $announcements = [
                    [
                        'title' => 'Enrollment for SY 2025-2026',
                        'date' => 'July 01, 2025',
                        'type' => 'URGENT',
                        'color' => 'red',
                        'author' => 'Registrar Office',
                        'content' => 'Official enrollment for the upcoming school year starts this coming Monday. Please prepare your documents including clearance and previous grade slips. Online enrollment portal will open at exactly 8:00 AM.'
                    ],
                    [
                        'title' => 'New LMS Features Integrated',
                        'date' => 'June 28, 2025',
                        'type' => 'UPDATE',
                        'color' => 'blue',
                        'author' => 'IT Department',
                        'content' => 'We have successfully integrated the new Calendar and Announcement panels for better navigation. Students can now sync their class schedules directly to their mobile devices via the "Get Mobile App" link in the footer.'
                    ],
                    [
                        'title' => 'Independence Day Holiday',
                        'date' => 'June 12, 2025',
                        'type' => 'INFO',
                        'color' => 'teal',
                        'author' => 'Admin Office',
                        'content' => 'In observance of Philippine Independence Day, classes and office work are suspended on June 12, 2025. Regular operations will resume on June 13.'
                    ],
                    [
                        'title' => 'Modern Laravel Webinar',
                        'date' => 'June 10, 2025',
                        'type' => 'EVENT',
                        'color' => 'purple',
                        'author' => 'CS Department',
                        'content' => 'Join our upcoming webinar on Laravel best practices for graduating students. We will cover advanced Eloquent patterns, TDD, and CI/CD pipelines. Registration is free for all CCDI students.'
                    ]
                ];
            @endphp

            @foreach($announcements as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                        <div class="flex items-center space-x-3">
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-{{ $item['color'] }}-50 text-{{ $item['color'] }}-600 border border-{{ $item['color'] }}-100">
                                {{ $item['type'] }}
                            </span>
                            <h2 class="text-lg font-black text-gray-800 tracking-tight">{{ $item['title'] }}</h2>
                        </div>
                        <div class="flex items-center text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $item['date'] }}
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 leading-relaxed mb-6 font-medium italic">
                        "{{ $item['content'] }}"
                    </p>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 rounded-full bg-brand-blue flex items-center justify-center text-[8px] text-white font-black">
                                {{ substr($item['author'], 0, 1) }}
                            </div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Posted by {{ $item['author'] }}</span>
                        </div>
                        <button class="text-[10px] font-black text-brand-blue uppercase tracking-widest hover:underline flex items-center">
                            Share Post
                            <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-6 3 3 0 000 6zm0 12a3 3 0 100-6 3 3 0 000 6z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
