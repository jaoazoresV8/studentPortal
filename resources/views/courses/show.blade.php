<x-app-layout>
    <x-slot name="header">
        Enrolled Students: {{ $course->name }}
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('courses.index') }}" class="text-[10px] font-black text-gray-400 hover:text-gray-600 uppercase tracking-widest transition-colors mr-4">Back to Courses</a>
        <a href="{{ route('students.create', ['course_id' => $course->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-bold text-[10px] text-white uppercase tracking-widest hover:bg-blue-700 transition duration-150">
            Enroll Student
        </a>
    </x-slot>

    <div class="max-w-7xl">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-8 p-6 flex flex-col md:flex-row md:items-center justify-between">
            <div>
                <span class="bg-blue-100 text-blue-600 px-2.5 py-1 rounded text-[10px] font-black uppercase tracking-widest border border-blue-100">Course Code: {{ $course->code }}</span>
                <h3 class="text-xl font-black text-gray-800 mt-2">{{ $course->name }}</h3>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mt-1">{{ $course->department }}</p>
            </div>
            <div class="mt-4 md:mt-0 text-center md:text-right">
                <div class="text-3xl font-black text-brand-blue">{{ $students->total() }}</div>
                <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Students Enrolled</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 bg-opacity-30 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Enrollment List</h3>

                <form action="{{ route('courses.show', $course) }}" method="GET" class="flex flex-col md:flex-row gap-2">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Click / to search..." class="text-[10px] border-gray-200 rounded-lg focus:ring-brand-blue focus:border-brand-blue py-1.5 pl-8 w-full md:w-64" value="{{ request('search') }}">
                        <svg class="w-3 h-3 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <select name="status" class="text-[10px] border-gray-200 rounded-lg focus:ring-brand-blue focus:border-brand-blue py-1.5 w-full md:w-32">
                        <option value="">All Status</option>
                        <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="Graduated" {{ request('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                    </select>
                    <button type="submit" class="bg-brand-blue text-white px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-opacity-90 transition-all flex items-center justify-center">
                        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Search
                    </button>
                    @if(request()->has('search') || request()->has('status'))
                        <a href="{{ route('courses.show', $course) }}" class="bg-gray-100 text-gray-600 px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-gray-200 transition-all text-center">Clear</a>
                    @endif
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <th class="px-6 py-4 font-bold">Student</th>
                            <th class="px-6 py-4 font-bold">Student ID</th>
                            <th class="px-6 py-4 font-bold">Email</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($students as $student)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-brand-blue flex items-center justify-center text-white font-bold text-[10px] shadow-sm">
                                    {{ strtoupper(substr($student->first_name, 0, 1)) . strtoupper(substr($student->last_name, 0, 1)) }}
                                </div>
                                <span class="text-xs font-bold text-gray-700">{{ $student->first_name }} {{ $student->last_name }}</span>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-gray-500 font-bold">{{ $student->student_number }}</td>
                            <td class="px-6 py-4 text-[11px] text-gray-400 font-medium">{{ $student->email }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-50 text-green-600 px-2 py-0.5 rounded text-[9px] font-black uppercase tracking-widest border border-green-100">{{ $student->status }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('students.edit', $student) }}" class="text-blue-600 hover:text-blue-900 text-[10px] font-bold uppercase tracking-widest">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400 italic text-sm">No students currently enrolled in this course.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-gray-50">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
