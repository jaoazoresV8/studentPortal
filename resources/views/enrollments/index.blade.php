<x-app-layout>
    <x-slot name="header">
        Enrollment Management
    </x-slot>

    <div class="max-w-7xl">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 bg-opacity-30 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">All System Enrollments</h3>

                <form action="{{ route('enrollments.index') }}" method="GET" class="flex flex-col md:flex-row gap-2">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Click / to search..." class="text-[10px] border-gray-200 rounded-lg focus:ring-brand-blue focus:border-brand-blue py-1.5 pl-8 w-full md:w-64" value="{{ request('search') }}">
                        <svg class="w-3 h-3 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <button type="submit" class="bg-brand-blue text-white px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-opacity-90 transition-all flex items-center justify-center">
                        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Search
                    </button>
                    @if(request()->has('search'))
                        <a href="{{ route('enrollments.index') }}" class="bg-gray-100 text-gray-600 px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest hover:bg-gray-200 transition-all text-center">Clear</a>
                    @endif
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <th class="px-6 py-4 font-bold">Student Name</th>
                            <th class="px-6 py-4 font-bold">Course / Subject</th>
                            <th class="px-6 py-4 font-bold">Student ID</th>
                            <th class="px-6 py-4 font-bold">Date Enrolled</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($enrollments as $e)
                        <tr class="text-[11px] hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-brand-red flex items-center justify-center text-white font-bold text-[10px] shadow-sm">
                                    {{ strtoupper(substr($e->first_name, 0, 1)) . strtoupper(substr($e->last_name, 0, 1)) }}
                                </div>
                                <span class="font-bold text-gray-700">{{ $e->first_name }} {{ $e->last_name }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 font-medium">{{ $e->course->name }}</td>
                            <td class="px-6 py-4 text-gray-400 font-bold uppercase">{{ $e->student_number }}</td>
                            <td class="px-6 py-4 text-gray-400 font-medium">{{ $e->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-50 text-green-600 px-2.5 py-1 rounded text-[9px] font-black uppercase tracking-widest border border-green-100">{{ $e->status }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('students.edit', $e) }}" class="text-blue-600 hover:text-blue-900 text-[10px] font-black uppercase tracking-widest">Edit Profile</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400 italic text-sm">No enrollments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-gray-50">
                {{ $enrollments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
