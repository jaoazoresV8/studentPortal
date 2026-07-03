<x-app-layout>
    <x-slot name="header">
        Edit Student
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Student Number -->
                        <div>
                            <x-input-label for="student_number" :value="__('Student Number')" />
                            <x-text-input id="student_number" class="block mt-1 w-full bg-gray-50" type="text" name="student_number" :value="old('student_number', $student->student_number)" required />
                            <x-input-error :messages="$errors->get('student_number')" class="mt-2" />
                        </div>

                        <!-- Course -->
                        <div>
                            <x-input-label for="course_id" :value="__('Course')" />
                            <select id="course_id" name="course_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>{{ $course->code }} - {{ $course->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
                        </div>

                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name', $student->first_name)" required />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name', $student->last_name)" required />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $student->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Contact Number -->
                        <div>
                            <x-input-label for="contact_number" :value="__('Contact Number')" />
                            <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number', $student->contact_number)" required />
                            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="Active" {{ old('status', $student->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status', $student->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Graduated" {{ old('status', $student->status) == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Profile Picture -->
                        <div>
                            <x-input-label for="profile_picture" :value="__('Update Profile Picture')" />
                            @if($student->profile_picture)
                                <div class="mt-2 mb-2">
                                    <img src="{{ asset('storage/'.$student->profile_picture) }}" class="h-20 w-20 rounded-full object-cover">
                                </div>
                            @endif
                            <input id="profile_picture" type="file" name="profile_picture" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('students.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline mr-4">Cancel</a>
                        <x-primary-button>
                            {{ __('Update Student') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
