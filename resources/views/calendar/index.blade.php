<x-app-layout>
    <x-slot name="header">
        Calendar Overview
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Calendar Guide</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Welcome to the Academic Calendar. Use the side panel to navigate through dates and view upcoming school events.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Quick Stats</h3>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-2xl font-black text-gray-800">12</p>
                    <p class="text-[10px] font-bold text-gray-500 uppercase">Events this month</p>
                </div>
                <div class="p-3 bg-brand-blue bg-opacity-10 rounded-xl">
                    <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Legend</h3>
            <div class="space-y-2">
                <div class="flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-brand-red"></span>
                    <span class="text-[10px] font-bold text-gray-600 uppercase">Academic Deadline</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-brand-teal"></span>
                    <span class="text-[10px] font-bold text-gray-600 uppercase">Holiday / Break</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
