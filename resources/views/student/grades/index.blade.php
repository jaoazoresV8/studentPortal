<x-app-layout>
    <x-slot name="header">
        Academic Grades
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl font-black text-gray-800 tracking-tight">Grade Report</h2>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">S.Y. 2026-2027 | Summer Semester</p>
                </div>
                <button onclick="window.print()" class="bg-brand-blue text-white px-6 py-2 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-opacity-90 transition-all shadow-md flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Print Report
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <th class="px-6 py-4 font-black">Course Code</th>
                            <th class="px-6 py-4 font-black">Course Name</th>
                            <th class="px-6 py-4 font-black text-center">Prelim</th>
                            <th class="px-6 py-4 font-black text-center">Midterm</th>
                            <th class="px-6 py-4 font-black text-center">Semi-Final</th>
                            <th class="px-6 py-4 font-black text-center">Final</th>
                            <th class="px-6 py-4 font-black text-center">Average</th>
                            <th class="px-6 py-4 font-black text-center">Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($grades as $grade)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-5">
                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-[10px] font-black uppercase tracking-tighter">{{ $grade->course->code }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="text-xs font-black text-gray-800">{{ $grade->course->name }}</div>
                                    <div class="text-[9px] text-gray-400 font-bold uppercase mt-0.5">{{ $grade->course->department }}</div>
                                </td>
                                <td class="px-6 py-5 text-center text-xs font-bold text-gray-700">{{ $grade->prelim ?? '-' }}</td>
                                <td class="px-6 py-5 text-center text-xs font-bold text-gray-700">{{ $grade->midterm ?? '-' }}</td>
                                <td class="px-6 py-5 text-center text-xs font-bold text-gray-700">{{ $grade->semi_final ?? '-' }}</td>
                                <td class="px-6 py-5 text-center text-xs font-bold text-gray-700">{{ $grade->final ?? '-' }}</td>
                                <td class="px-6 py-5 text-center">
                                    <span class="text-xs font-black {{ $grade->average >= 75 ? 'text-brand-blue' : 'text-red-500' }}">
                                        {{ number_format($grade->average, 2) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $grade->remarks === 'Passed' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                        {{ $grade->remarks }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">No grades recorded for this semester yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Grade Legend -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Grade Scale</h3>
                <div class="space-y-2">
                    <div class="flex justify-between text-[11px] font-bold">
                        <span class="text-gray-500">95 - 100</span>
                        <span class="text-brand-blue">Excellent</span>
                    </div>
                    <div class="flex justify-between text-[11px] font-bold">
                        <span class="text-gray-500">85 - 94</span>
                        <span class="text-brand-blue">Very Good</span>
                    </div>
                    <div class="flex justify-between text-[11px] font-bold">
                        <span class="text-gray-500">75 - 84</span>
                        <span class="text-brand-blue">Satisfactory</span>
                    </div>
                    <div class="flex justify-between text-[11px] font-bold">
                        <span class="text-gray-500">Below 75</span>
                        <span class="text-red-500">Failed</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 col-span-2">
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Academic Status</h3>
                <div class="flex items-center space-x-8">
                    <div>
                        <p class="text-2xl font-black text-gray-800">1.25</p>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">GPA This Semester</p>
                    </div>
                    <div class="w-px h-12 bg-gray-100"></div>
                    <div>
                        <p class="text-2xl font-black text-green-600">Regular</p>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Classification</p>
                    </div>
                    <div class="w-px h-12 bg-gray-100"></div>
                    <div class="bg-green-50 px-4 py-2 rounded-xl border border-green-100">
                        <p class="text-[10px] font-black text-green-600 uppercase">Dean's Lister Candidate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
