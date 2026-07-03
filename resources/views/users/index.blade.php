<x-app-layout>
    <x-slot name="header">
        User Management
    </x-slot>

    <x-slot name="actions">
        <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-bold text-[10px] text-white uppercase tracking-widest hover:bg-blue-700 transition duration-150">
            Add User
        </a>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <form action="{{ route('users.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-grow">
                        <input type="text" name="search" placeholder="Click / to search..." class="w-full border-gray-200 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue" value="{{ request('search') }}">
                    </div>
                    <div class="w-full md:w-48">
                        <select name="role" class="w-full border-gray-200 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue">
                            <option value="">All Roles</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-brand-blue text-white px-6 py-2 rounded-lg text-sm font-bold uppercase tracking-wider hover:bg-opacity-90 transition-all flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Search
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <th class="px-6 py-4 font-semibold">User</th>
                            <th class="px-6 py-4 font-semibold">Role</th>
                            <th class="px-6 py-4 font-semibold">Created At</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    @if($user->profile_picture)
                                        <img src="{{ asset('storage/'.$user->profile_picture) }}" class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" class="w-8 h-8 rounded-full">
                                    @endif
                                    <div>
                                        <div class="text-xs font-bold text-gray-800">{{ $user->name }}</div>
                                        <div class="text-[10px] text-gray-400">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded text-[9px] font-bold uppercase tracking-tighter {{ $user->role === 'admin' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-gray-500">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900 text-xs font-bold uppercase tracking-widest">Edit</a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs font-bold uppercase tracking-widest">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-gray-50">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
