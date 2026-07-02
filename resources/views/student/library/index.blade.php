<x-app-layout>
    <x-slot name="header">
        Library Resources
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-xl font-black text-gray-800 tracking-tight mb-2">Digital Library</h2>
            <p class="text-sm text-gray-400 font-bold uppercase tracking-widest mb-8">Access thousands of books and journals online</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:border-brand-blue transition-all group">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-brand-blue shadow-sm mb-4 group-hover:bg-brand-blue group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-sm font-black text-gray-800 uppercase tracking-tight">E-Books</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Browse our collection of digital textbooks and reference materials.</p>
                    <a href="#" class="mt-4 text-[10px] font-black text-brand-blue uppercase hover:underline inline-block">Browse Catalog</a>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:border-brand-teal transition-all group">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-brand-teal shadow-sm mb-4 group-hover:bg-brand-teal group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h10M7 16h10"></path></svg>
                    </div>
                    <h3 class="text-sm font-black text-gray-800 uppercase tracking-tight">Journals</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Access the latest research papers and academic journals.</p>
                    <a href="#" class="mt-4 text-[10px] font-black text-brand-teal uppercase hover:underline inline-block">View Journals</a>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:border-brand-red transition-all group">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-brand-red shadow-sm mb-4 group-hover:bg-brand-red group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-sm font-black text-gray-800 uppercase tracking-tight">Multimedia</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Watch educational videos and instructional media resources.</p>
                    <a href="#" class="mt-4 text-[10px] font-black text-brand-red uppercase hover:underline inline-block">Open Media</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
