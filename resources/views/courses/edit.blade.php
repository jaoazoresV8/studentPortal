<x-app-layout>
    <x-slot name="header">
        Edit Course: {{ $course->code }}
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 bg-opacity-30 flex items-center justify-between">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Update Course Details</h3>
                <span class="text-[9px] font-black uppercase tracking-widest text-gray-400">ID: #{{ $course->id }}</span>
            </div>

            <form action="{{ route('courses.update', $course) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Course Code -->
                    <div>
                        <x-input-label for="code" :value="__('Course Code')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="code" class="block mt-1 w-full text-sm" type="text" name="code" :value="old('code', $course->code)" required autofocus placeholder="e.g. IT201" />
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>

                    <!-- Course Name -->
                    <div>
                        <x-input-label for="name" :value="__('Course Name / Subject Title')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="name" class="block mt-1 w-full text-sm" type="text" name="name" :value="old('name', $course->name)" required placeholder="e.g. Event Driven Programming" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Department -->
                    <div>
                        <x-input-label for="department" :value="__('Department')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="department" class="block mt-1 w-full text-sm" type="text" name="department" :value="old('department', $course->department)" required placeholder="e.g. CCDI" />
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <textarea id="description" name="description" class="block mt-1 w-full border-gray-200 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue" rows="4" placeholder="Briefly describe the course content...">{{ old('description', $course->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-8 pt-6 border-t">
                    <a href="{{ route('courses.index') }}" class="text-[10px] font-black text-gray-400 hover:text-gray-600 uppercase tracking-widest mr-6 transition-colors">Cancel Changes</a>
                    <button type="submit" class="bg-brand-blue text-white px-8 py-2.5 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 shadow-lg shadow-blue-900/20 transition-all">
                        Update Course Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
