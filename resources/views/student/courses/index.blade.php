<x-app-layout>
    <x-slot name="header">
        My Courses
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl font-black text-gray-800 tracking-tight">Enrolled Courses</h2>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Summer Semester 2026</p>
                </div>

                <form action="{{ route('student.courses') }}" method="GET" class="flex items-center bg-gray-50 rounded-xl px-4 py-2 border border-gray-100 focus-within:border-brand-blue transition-colors">
                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Click / to search..." class="bg-transparent border-none focus:ring-0 text-sm text-gray-700 w-full md:w-64">
                    <button type="submit" class="hidden">Search</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $gradients = [
                        'from-purple-500 to-indigo-600',
                        'from-blue-400 to-blue-600',
                        'from-green-400 to-emerald-600',
                        'from-orange-400 to-red-500',
                        'from-pink-500 to-rose-600',
                        'from-teal-400 to-cyan-500'
                    ];
                @endphp

                @forelse($courses as $index => $course)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group cursor-pointer hover:shadow-md transition-all relative flex flex-col">
                        <div class="h-32 bg-gradient-to-r {{ $gradients[$index % count($gradients)] }} p-4 flex items-center justify-center relative overflow-hidden">
                            <svg class="w-16 h-16 text-white opacity-20 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[9px] font-black px-2 py-0.5 rounded-full bg-gray-100 text-gray-500 uppercase tracking-widest">{{ $course->code }}</span>
                                <span class="text-[9px] font-bold text-brand-blue uppercase">{{ $course->department }}</span>
                            </div>
                            <h4 class="text-sm font-black text-gray-800 leading-tight mb-2">{{ $course->name }}</h4>

                            <div class="mt-auto pt-4 border-t border-gray-50">
                                @php $progress = $course->progress; @endphp
                                <div class="flex justify-between text-[10px] font-black uppercase mb-1.5">
                                    <span class="text-gray-400">Course Progress</span>
                                    <span class="text-brand-blue">{{ $progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-brand-blue h-full transition-all duration-1000" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>

                            <a href="{{ route('student.courses.show', $course) }}" class="mt-4 bg-brand-blue text-white text-center py-2 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 transition-all">
                                Continue Learning
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400 font-bold uppercase tracking-widest">No courses found matching your search.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
