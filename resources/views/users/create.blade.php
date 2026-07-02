<x-app-layout>
    <x-slot name="header">
        Add New User
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 bg-opacity-30">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">User Information</h3>
            </div>

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="name" class="block mt-1 w-full text-sm" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Role -->
                        <div>
                            <x-input-label for="role" :value="__('System Role')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                            <select id="role" name="role" class="block mt-1 w-full border-gray-200 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue" required>
                                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff / Instructor</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Profile Picture -->
                        <div>
                            <x-input-label for="profile_picture" :value="__('Profile Picture')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                            <input id="profile_picture" type="file" name="profile_picture" class="block mt-1 w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all" />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">
                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                            <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full text-sm" type="password" name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-8 pt-6 border-t">
                    <a href="{{ route('users.index') }}" class="text-[10px] font-black text-gray-400 hover:text-gray-600 uppercase tracking-widest mr-6 transition-colors">Cancel</a>
                    <button type="submit" class="bg-brand-blue text-white px-8 py-2.5 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 shadow-lg shadow-blue-900/20 transition-all">
                        Create User Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
