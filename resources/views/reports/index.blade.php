<x-app-layout>
    <x-slot name="header">
        System Reports
    </x-slot>

    <x-slot name="actions">
        <button onclick="window.print()" class="bg-brand-blue text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 transition-all flex items-center shadow-md">
            <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Print Report
        </button>
    </x-slot>

    <div class="max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <!-- Student Status Distribution Blob -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-all">
                <div class="p-6 border-b border-gray-50 bg-gray-50 bg-opacity-30">
                    <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Student Status Distribution</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-[10px] font-black text-green-500 uppercase tracking-widest">Active</p>
                                <p class="text-2xl font-black text-gray-800">{{ number_format($data['student_stats']['active']) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Percentage</p>
                                <p class="text-sm font-black text-gray-600">{{ $data['student_stats']['total'] > 0 ? round(($data['student_stats']['active'] / $data['student_stats']['total']) * 100, 1) : 0 }}%</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-green-500 h-full" style="width: {{ $data['student_stats']['total'] > 0 ? ($data['student_stats']['active'] / $data['student_stats']['total']) * 100 : 0 }}%"></div>
                        </div>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-[10px] font-black text-blue-500 uppercase tracking-widest">Graduated</p>
                                <p class="text-2xl font-black text-gray-800">{{ number_format($data['student_stats']['graduated']) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-black text-gray-600">{{ $data['student_stats']['total'] > 0 ? round(($data['student_stats']['graduated'] / $data['student_stats']['total']) * 100, 1) : 0 }}%</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-blue-500 h-full" style="width: {{ $data['student_stats']['total'] > 0 ? ($data['student_stats']['graduated'] / $data['student_stats']['total']) * 100 : 0 }}%"></div>
                        </div>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-[10px] font-black text-red-500 uppercase tracking-widest">Inactive</p>
                                <p class="text-2xl font-black text-gray-800">{{ number_format($data['student_stats']['inactive']) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-black text-gray-600">{{ $data['student_stats']['total'] > 0 ? round(($data['student_stats']['inactive'] / $data['student_stats']['total']) * 100, 1) : 0 }}%</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-red-500 h-full" style="width: {{ $data['student_stats']['total'] > 0 ? ($data['student_stats']['inactive'] / $data['student_stats']['total']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Enrollment Blob -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden md:col-span-1 lg:col-span-2">
                <div class="p-6 border-b border-gray-50 bg-gray-50 bg-opacity-30 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Enrollment by Course</h3>
                    <span class="text-[9px] font-black text-brand-blue bg-blue-50 px-3 py-1 rounded-full uppercase">Top Subjects</span>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($data['course_stats']->take(6) as $course)
                        <div class="flex items-center space-x-4 p-3 rounded-xl border border-gray-50 hover:bg-gray-50 transition-colors">
                            <div class="bg-brand-blue text-white w-10 h-10 rounded-lg flex items-center justify-center font-black text-[10px] shadow-sm">
                                {{ $course->code }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[11px] font-black text-gray-800 truncate uppercase tracking-tight">{{ $course->name }}</p>
                                <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">{{ $course->students_count }} Enrolled</p>
                            </div>
                            <div class="text-brand-red font-black text-sm">
                                {{ $data['student_stats']['total'] > 0 ? round(($course->students_count / $data['student_stats']['total']) * 100, 0) : 0 }}%
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- User System Roles Blob -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="p-6 border-b border-gray-50 bg-gray-50 bg-opacity-30">
                    <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">System Access Roles</h3>
                </div>
                <div class="p-8 flex flex-col items-center justify-center flex-1">
                    <div class="relative w-40 h-40 rounded-full flex items-center justify-center" style="background: conic-gradient(#A41D31 0% 20%, #012b6e 20% 100%);">
                        <div class="absolute w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-inner">
                            <div class="text-center">
                                <p class="text-2xl font-black text-gray-800 leading-tight">{{ $data['total_users'] }}</p>
                                <p class="text-[8px] text-gray-400 uppercase font-black tracking-widest">Total Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 w-full space-y-4">
                        @foreach($data['user_role_stats'] as $role)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-sm {{ $role->role == 'admin' ? 'bg-brand-red' : 'bg-brand-blue' }} mr-3"></span>
                                <p class="text-[10px] font-black text-gray-600 uppercase tracking-widest">{{ ucfirst($role->role) }}s</p>
                            </div>
                            <p class="text-xs font-black text-gray-800">{{ $role->total }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Audit Trail Summary Blob -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 bg-gray-50 bg-opacity-30 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">System Activity Summary</h3>
                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest italic">Last 20 records</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[9px] text-gray-400 uppercase tracking-widest border-b border-gray-50">
                                <th class="px-6 py-4 font-black">Admin/Staff</th>
                                <th class="px-6 py-4 font-black">Action Performed</th>
                                <th class="px-6 py-4 font-black">Description</th>
                                <th class="px-6 py-4 font-black">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($data['recent_activities'] as $log)
                            <tr class="text-[10px] hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-brand-blue uppercase">{{ $log->user->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-[8px] font-black uppercase tracking-tighter border border-gray-200">
                                        {{ $log->action }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 font-medium italic">{{ $log->description }}</td>
                                <td class="px-6 py-4 text-gray-400 font-bold uppercase">{{ $log->created_at->format('M d, h:i A') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic text-[11px]">No activity logs generated yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            aside, header, .no-print, [name="actions"] {
                display: none !important;
            }
            main {
                margin-left: 0 !important;
                padding: 0 !important;
            }
            .max-w-7xl {
                max-width: 100% !important;
            }
        </div>
    </style>
</x-app-layout>
