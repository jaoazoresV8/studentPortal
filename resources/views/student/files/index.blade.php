<x-app-layout>
    <x-slot name="header">
        Files & Resources
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($files as $file)
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all group cursor-pointer">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gray-50 rounded-xl text-gray-400 group-hover:bg-brand-blue group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $file['icon'] }}"></path></svg>
                    </div>
                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">{{ $file['type'] }}</span>
                </div>
                <h4 class="text-xs font-black text-gray-800 mb-1 truncate">{{ $file['name'] }}</h4>
                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                    <span class="text-[10px] font-bold text-gray-400 uppercase">{{ $file['size'] }}</span>
                    <span class="text-[10px] font-bold text-gray-400 uppercase">{{ $file['date'] }}</span>
                </div>
                <a href="{{ route('student.files.download', $file['id']) }}" class="w-full mt-4 bg-gray-50 text-gray-600 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-brand-blue hover:text-white transition-all text-center block" data-pjax="false">Download</a>
            </div>
        @endforeach
    </div>
</x-app-layout>
