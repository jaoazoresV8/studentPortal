<x-app-layout>
    <x-slot name="header">
        Edit User: {{ $user->name }}
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 bg-opacity-30 flex items-center justify-between">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Update User Account</h3>
                <span class="text-[9px] font-black uppercase tracking-widest text-gray-400">ID: #{{ $user->id }}</span>
            </div>

            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8 mb-8 bg-blue-50 bg-opacity-30 p-4 rounded-xl border border-blue-50">
                        <div class="relative group">
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/'.$user->profile_picture) }}" class="w-24 h-24 rounded-2xl object-cover shadow-md border-4 border-white">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=012b6e&color=fff&size=128" class="w-24 h-24 rounded-2xl shadow-md border-4 border-white">
                            @endif
                            <div class="absolute inset-0 bg-black bg-opacity-40 rounded-2xl opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity cursor-pointer">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                        </div>
                        <div class="text-center md:text-left">
                            <h4 class="text-sm font-black text-gray-800 uppercase tracking-tight">{{ $user->name }}</h4>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">{{ $user->role }} ACCOUNT</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Member since {{ $user->created_at->format('M Y') }}</p>
                        </div>
                    </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="name" class="block mt-1 w-full text-sm" type="text" name="name" :value="old('name', $user->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                        <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email', $user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Role -->
                        <div>
                            <x-input-label for="role" :value="__('System Role')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                            <select id="role" name="role" class="block mt-1 w-full border-gray-200 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue" required>
                                <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff / Instructor</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Profile Picture -->
                        <div>
                            <x-input-label for="profile_picture" :value="__('Change Profile Picture')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                            <input id="profile_picture" type="file" name="profile_picture" class="block mt-1 w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all" />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>
                    </div>

                    <div class="border-t pt-6">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Security <span class="text-orange-400 ml-2 font-normal lowercase">(leave password blank to keep current)</span></p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Password -->
                            <div>
                                <x-input-label for="password" :value="__('New Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                                <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm New Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full text-sm" type="password" name="password_confirmation" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-8 pt-6 border-t">
                    <a href="{{ route('users.index') }}" class="text-[10px] font-black text-gray-400 hover:text-gray-600 uppercase tracking-widest mr-6 transition-colors">Cancel Changes</a>
                    <button type="submit" class="bg-brand-blue text-white px-8 py-2.5 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 shadow-lg shadow-blue-900/20 transition-all">
                        Update Account Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
