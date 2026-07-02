<x-app-layout>
    <x-slot name="hideHeader">true</x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Main Dashboard Content -->
        <div class="lg:col-span-12 space-y-6">
            <!-- Welcome Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-6">
                <div class="relative">
                    @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/'.Auth::user()->profile_picture) }}" class="w-24 h-24 rounded-full object-cover border-4 border-gray-50 shadow-sm">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=A41D31&color=fff&size=128" class="w-24 h-24 rounded-full object-cover border-4 border-gray-50 shadow-sm">
                    @endif
                    <div class="absolute -bottom-1 -right-1 bg-green-500 w-6 h-6 rounded-full border-4 border-white"></div>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Welcome back,</p>
                    <h2 class="text-3xl font-black text-gray-800 tracking-tight flex items-center">
                        {{ Auth::user()->name }} <span class="ml-2">👋</span>
                    </h2>
                    <div class="mt-2 flex items-center space-x-4">
                        <span class="text-xs font-bold text-brand-blue uppercase bg-blue-50 px-2 py-1 rounded">BSIT - 3rd Year</span>
                        <span class="text-xs font-bold text-gray-400 uppercase">Student ID: {{ Auth::user()->student_id ?? '20211010045' }}</span>
                    </div>
                </div>
                <div class="hidden md:block w-64 bg-gray-50 p-4 rounded-xl border border-dashed border-gray-200">
                    <p class="text-[11px] italic text-gray-500 leading-relaxed text-center">
                        "The expert in anything was once a beginner."
                    </p>
                    <p class="text-[10px] font-bold text-gray-400 uppercase mt-2 text-right">— Helen Hayes</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:border-brand-blue transition-colors cursor-pointer">
                    <div class="bg-blue-50 w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:bg-brand-blue transition-colors">
                        <svg class="w-6 h-6 text-brand-blue group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Enrolled Courses</p>
                    <p class="text-3xl font-black text-gray-800">6</p>
                    <a href="{{ route('student.courses') }}" class="text-[10px] font-black text-brand-blue uppercase mt-2 block hover:underline">View all courses</a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:border-brand-teal transition-colors cursor-pointer">
                    <div class="bg-teal-50 w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:bg-brand-teal transition-colors">
                        <svg class="w-6 h-6 text-brand-teal group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Pending Tasks</p>
                    <p class="text-3xl font-black text-gray-800">4</p>
                    <a href="#" class="text-[10px] font-black text-brand-teal uppercase mt-2 block hover:underline">View my tasks</a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:border-yellow-500 transition-colors cursor-pointer">
                    <div class="bg-yellow-50 w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:bg-yellow-500 transition-colors">
                        <svg class="w-6 h-6 text-yellow-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Unread Messages</p>
                    <p class="text-3xl font-black text-gray-800">3</p>
                    <a href="#" class="text-[10px] font-black text-yellow-600 uppercase mt-2 block hover:underline">Go to messages</a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:border-red-500 transition-colors cursor-pointer">
                    <div class="bg-red-50 w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:bg-red-500 transition-colors">
                        <svg class="w-6 h-6 text-red-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">Upcoming Exams</p>
                    <p class="text-3xl font-black text-gray-800">2</p>
                    <a href="#" class="text-[10px] font-black text-red-600 uppercase mt-2 block hover:underline">View my exams</a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- My Courses Section -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-black text-gray-800 uppercase tracking-tight">My Courses</h3>
                        <a href="{{ route('student.courses') }}" class="text-[10px] font-black text-brand-blue uppercase hover:underline">View all courses</a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                        $gradients = [
                            'from-purple-500 to-indigo-600',
                            'from-blue-400 to-blue-600',
                            'from-green-400 to-emerald-600',
                            'from-orange-400 to-red-500'
                        ];
                        $icons = [
                            'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                            'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                            'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                            'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                        ];
                    @endphp

                    @foreach($courses as $index => $course)
                        <div @click="window.location='{{ route('student.courses.show', $course) }}'" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group cursor-pointer hover:shadow-md transition-all">
                            <div class="h-24 bg-gradient-to-r {{ $gradients[$index % 4] }} p-4 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icons[$index % 4] }}"></path></svg>
                            </div>
                            <div class="p-4">
                                <span class="text-[8px] font-black px-2 py-0.5 rounded-full bg-{{ explode('-', $gradients[$index % 4])[1] }}-100 text-{{ explode('-', $gradients[$index % 4])[1] }}-600 uppercase tracking-widest">Summer 2026</span>
                                <h4 class="text-xs font-black text-gray-800 mt-2">{{ $course->name }}</h4>
                                <p class="text-[9px] text-gray-400 font-bold uppercase mt-1">Professor Smith</p>
                                <div class="mt-4">
                                    @php $progress = $course->progress; @endphp
                                    <div class="flex justify-between text-[9px] font-black uppercase mb-1">
                                        <span class="text-gray-400">Progress</span>
                                        <span class="text-brand-blue">{{ $progress }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-brand-blue h-full rounded-full transition-all" style="width: {{ $progress }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>

                <!-- To Do List Section -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-black text-gray-800 uppercase tracking-tight">To Do List</h3>
                        <a href="#" class="text-[10px] font-black text-brand-blue uppercase hover:underline">View all tasks</a>
                    </div>

                    <!-- Add Task Form -->
                    <form action="{{ route('todos.store') }}" method="POST" class="mb-4 flex space-x-2">
                        @csrf
                        <input type="text" name="title" placeholder="Add a new task..." class="flex-1 text-sm border-gray-100 bg-gray-50 rounded-xl focus:ring-brand-blue focus:border-brand-blue border-none p-3 shadow-inner" required>
                        <button type="submit" class="bg-brand-blue text-white px-6 py-2 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-opacity-90 transition-all shadow-md">Add</button>
                    </form>

                    <div class="space-y-3 max-h-[500px] overflow-y-auto pr-2 custom-scrollbar">
                        @forelse($todos as $todo)
                            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-gray-100 hover:border-gray-200 transition-all group shadow-sm {{ $todo->is_completed ? 'bg-gray-50 opacity-60' : '' }}">
                                <div class="flex items-center space-x-4">
                                    <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-6 h-6 border-2 rounded-lg transition-colors flex items-center justify-center {{ $todo->is_completed ? 'bg-brand-blue border-brand-blue' : 'border-gray-200 group-hover:border-brand-blue' }}">
                                            @if($todo->is_completed)
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                            @endif
                                        </button>
                                    </form>
                                    <div>
                                        <span class="text-sm font-bold {{ $todo->is_completed ? 'text-gray-400 line-through' : 'text-gray-700' }}">{{ $todo->title }}</span>
                                        @if($todo->due_date)
                                            <p class="text-[9px] font-black mt-0.5 {{ $todo->due_date->isPast() && !$todo->is_completed ? 'text-red-500' : 'text-gray-400' }} uppercase">
                                                Due {{ $todo->due_date->format('F d, Y') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">No tasks yet</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
