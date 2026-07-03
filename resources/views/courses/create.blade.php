<x-app-layout>
    <x-slot name="header">
        Add New Course
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Course Code -->
                        <div>
                            <x-input-label for="code" :value="__('Course Code')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus placeholder="e.g. BSIT" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <!-- Course Name -->
                        <div>
                            <x-input-label for="name" :value="__('Course Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required placeholder="e.g. Bachelor of Science in Information Technology" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Department -->
                        <div>
                            <x-input-label for="department" :value="__('Department')" />
                            <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required placeholder="e.g. CCDI" />
                            <x-input-error :messages="$errors->get('department')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('courses.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline mr-4">Cancel</a>
                        <x-primary-button>
                            {{ __('Save Course') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
