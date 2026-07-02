<x-app-layout>
    <x-slot name="header">
        {{ $course->name }}
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('student.courses') }}" class="text-[10px] font-black text-gray-400 hover:text-gray-600 uppercase tracking-widest transition-colors mr-4">Back to My Courses</a>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="bg-blue-50 text-brand-blue px-3 py-1 rounded text-[10px] font-black uppercase tracking-widest">{{ $course->code }}</span>
                        <h2 class="text-2xl font-black text-gray-800 mt-3">{{ $course->name }}</h2>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mt-1">{{ $course->department }}</p>
                    </div>
                    <div class="text-right">
                        @php $progress = $course->progress; @endphp
                        <div class="text-3xl font-black text-brand-blue">{{ $progress }}%</div>
                        <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Completed</div>
                    </div>
                </div>

                <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden mb-8">
                    <div class="bg-brand-blue h-full transition-all duration-1000" style="width: {{ $progress }}%"></div>
                </div>

                <div class="prose prose-sm max-w-none text-gray-600">
                    <h3 class="text-gray-800 font-black uppercase text-xs tracking-widest mb-4">Course Description</h3>
                    <p>{{ $course->description ?? 'No description available for this course.' }}</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                    <h3 class="font-black text-gray-800 uppercase tracking-tight">Course Lessons</h3>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ count($course->lessons) }} Lessons</span>
                </div>

                <div class="divide-y divide-gray-50">
                    @foreach($course->lessons as $lesson)
                        <div class="p-6 hover:bg-gray-50 transition-all group">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center font-black text-xs {{ in_array($lesson->id, $completedLessons) ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                        {{ $lesson->order }}
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-black text-gray-800 group-hover:text-brand-blue transition-colors">{{ $lesson->title }}</h4>
                                        <div class="mt-2 text-xs text-gray-500 line-clamp-2">
                                            {{ $lesson->content }}
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('lessons.toggle-complete', $lesson) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center space-x-2 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all
                                        {{ in_array($lesson->id, $completedLessons)
                                            ? 'bg-green-50 text-green-600 border border-green-100'
                                            : 'bg-brand-blue text-white shadow-md hover:bg-opacity-90' }}">
                                        @if(in_array($lesson->id, $completedLessons))
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                            Completed
                                        @else
                                            Mark as Complete
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xs font-black text-gray-800 uppercase tracking-widest mb-6">Course Instructor</h3>
                <div class="flex items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name=Professor+Smith&background=012b6e&color=fff" class="w-12 h-12 rounded-xl">
                    <div>
                        <p class="text-sm font-black text-gray-800">Professor Smith</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Department Head</p>
                    </div>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-50">
                    <p class="text-[11px] text-gray-500 leading-relaxed italic">
                        "Enthusiastic about teaching modern web technologies and building scalable applications."
                    </p>
                </div>
            </div>

            <div class="bg-brand-blue p-6 rounded-2xl shadow-lg text-white">
                <h3 class="text-xs font-black uppercase tracking-widest mb-4 opacity-80">Quick Resources</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="flex items-center text-[11px] font-bold hover:translate-x-1 transition-transform">
                        <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Course Syllabus (PDF)
                    </a></li>
                    <li><a href="#" class="flex items-center text-[11px] font-bold hover:translate-x-1 transition-transform">
                        <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        E-Book Reference
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
