<x-app-layout>
    <x-slot name="header">
        Student Handbook
    </x-slot>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/3">
                <div class="bg-brand-blue rounded-2xl p-6 text-white shadow-xl text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <h3 class="text-lg font-black uppercase tracking-tight">Manual of Regulations</h3>
                    <p class="text-[10px] font-bold opacity-60 uppercase mt-2">Revised Edition 2026</p>
                    <button class="w-full mt-6 bg-white text-brand-blue py-3 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-opacity-90 transition-all shadow-md">Download Full PDF</button>
                </div>
            </div>

            <div class="flex-1 space-y-6">
                <h2 class="text-xl font-black text-gray-800 tracking-tight">Table of Contents</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-brand-blue transition-colors cursor-pointer group">
                        <span class="text-[10px] font-black text-brand-blue uppercase tracking-widest">Article I</span>
                        <h4 class="text-sm font-bold text-gray-700 mt-1">General Principles and Academic Policies</h4>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-brand-blue transition-colors cursor-pointer group">
                        <span class="text-[10px] font-black text-brand-blue uppercase tracking-widest">Article II</span>
                        <h4 class="text-sm font-bold text-gray-700 mt-1">Student Rights and Responsibilities</h4>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-brand-blue transition-colors cursor-pointer group">
                        <span class="text-[10px] font-black text-brand-blue uppercase tracking-widest">Article III</span>
                        <h4 class="text-sm font-bold text-gray-700 mt-1">Code of Discipline and Conduct</h4>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-brand-blue transition-colors cursor-pointer group">
                        <span class="text-[10px] font-black text-brand-blue uppercase tracking-widest">Article IV</span>
                        <h4 class="text-sm font-bold text-gray-700 mt-1">Campus Services and Organizations</h4>
                    </div>
                </div>

                <div class="p-6 bg-yellow-50 border border-yellow-100 rounded-2xl">
                    <p class="text-xs text-yellow-800 leading-relaxed">
                        <strong>Important:</strong> All students are required to read and understand the provisions stated in this handbook.
                        Ignorance of the law excuses no one from compliance therewith.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
