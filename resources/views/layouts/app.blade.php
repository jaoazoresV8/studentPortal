<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=JetBrains+Mono:wght@400;700&family=Merriweather:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>

        <style>
            [x-cloak] { display: none !important; }
            body { background-color: #f4f7fa; height: 100vh; overflow: hidden; }
            #pjax-container { transition: opacity 0.2s ease-in-out; }
            .pjax-loading { opacity: 0.5; pointer-events: none; }

            /* Accessibility Fonts */
            .font-figtree { font-family: 'Figtree', sans-serif !important; }
            .font-inter { font-family: 'Inter', sans-serif !important; }
            .font-merriweather { font-family: 'Merriweather', serif !important; }
            .font-mono { font-family: 'JetBrains Mono', monospace !important; }
            .font-opensans { font-family: 'Open Sans', sans-serif !important; }
        </style>
    </head>
    <body class="antialiased text-gray-800"
          x-data="{
            sidebarOpen: false,
            calendarOpen: {{ request()->routeIs('calendar.*') ? 'true' : 'false' }},
            announcementsOpen: false,
            accessibilityOpen: false,
            currentFont: localStorage.getItem('portal-font') || 'font-figtree'
          }"
          :class="currentFont">
        @php
            $systemSettings = \App\Models\Setting::all()->pluck('value', 'key');
            $sysName = $systemSettings['system_name'] ?? 'Computer Communication Development Institute';
            $sysLogo = $systemSettings['system_logo'] ?? 'ccdi_logo.png';
            $logoUrl = ($sysLogo === 'ccdi_logo.png') ? asset('ccdi_logo.png') : asset('storage/'.$sysLogo);

            $academicYear = $systemSettings['academic_year'] ?? '2025';
            // Extract the first 4 digits if it's a range like 2025-2026
            preg_match('/\d{4}/', $academicYear, $matches);
            $sysYear = $matches[0] ?? date('Y');
        @endphp
        <div class="flex flex-col h-screen">
            <!-- Topbar -->
            <header class="bg-brand-red text-white h-20 flex items-center justify-between px-4 z-50 shadow-lg shrink-0 border-b border-white border-opacity-10">
                <div class="flex items-center">
                    <button class="mr-4 lg:hidden focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 p-1 rounded-md" @click="sidebarOpen = !sidebarOpen">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <div class="flex items-center">
                        <div class="bg-white p-1 rounded-sm flex items-center justify-center mr-4 shadow-md transform hover:scale-105 transition-transform">
                            <img src="{{ asset('ccdi_logo.png') }}" class="h-12 w-auto object-contain">
                        </div>
                        <div class="border-l-2 border-white border-opacity-40 pl-4 py-1 flex items-center">
                            <div class="brand-text uppercase leading-none">
                                <div class="text-stroke-white font-black text-lg md:text-2xl tracking-tighter">
                                    {{ $sysName }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-5">
                    <!-- Notifications -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="relative hover:bg-white hover:bg-opacity-10 p-2 rounded-full transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            <span class="absolute top-1 right-1 bg-red-500 text-white text-[9px] font-bold rounded-full h-4 w-4 flex items-center justify-center border-2 border-brand-red">3</span>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-3 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-[60] border border-gray-100" x-cloak x-transition>
                            <div class="bg-gray-50 px-4 py-2 border-b">
                                <span class="text-[10px] font-black uppercase tracking-widest text-gray-800">Notifications</span>
                            </div>
                            <div class="divide-y divide-gray-50 max-h-96 overflow-y-auto">
                                <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors">
                                    <p class="text-[11px] font-bold text-gray-800">New Student Registered</p>
                                    <p class="text-[10px] text-gray-500 mt-0.5">John Doe has been added to IT201.</p>
                                    <p class="text-[9px] text-gray-400 mt-1 uppercase font-bold">2 mins ago</p>
                                </a>
                                <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors">
                                    <p class="text-[11px] font-bold text-gray-800">Course Update</p>
                                    <p class="text-[10px] text-gray-500 mt-0.5">Networking 1 course details were updated.</p>
                                    <p class="text-[9px] text-gray-400 mt-1 uppercase font-bold">1 hour ago</p>
                                </a>
                            </div>
                            <a href="#" class="block text-center py-2 text-[10px] font-black text-brand-blue uppercase hover:bg-gray-50 border-t bg-gray-50 bg-opacity-30">View All Notifications</a>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="hover:bg-white hover:bg-opacity-10 p-2 rounded-full transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-3 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-[60] border border-gray-100" x-cloak x-transition>
                            <div class="bg-gray-50 px-4 py-2 border-b">
                                <span class="text-[10px] font-black uppercase tracking-widest text-gray-800">Messages</span>
                            </div>
                            <div class="divide-y divide-gray-50 max-h-96 overflow-y-auto">
                                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors space-x-3">
                                    <img src="https://ui-avatars.com/api/?name=Admin+Support&background=A41D31&color=fff" class="w-8 h-8 rounded-full">
                                    <div>
                                        <p class="text-[11px] font-bold text-gray-800">System Administrator</p>
                                        <p class="text-[10px] text-gray-500 truncate w-48">Please review the new course modules.</p>
                                        <p class="text-[9px] text-gray-400 mt-1 uppercase font-bold">Just now</p>
                                    </div>
                                </a>
                            </div>
                            <a href="#" class="block text-center py-2 text-[10px] font-black text-brand-blue uppercase hover:bg-gray-50 border-t bg-gray-50 bg-opacity-30">Open Messenger</a>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3 border-l border-white border-opacity-20 pl-5">
                        <div class="text-right hidden sm:block">
                            <div class="text-xs font-bold">{{ Auth::user()->name }}</div>
                            <div class="text-[9px] opacity-70 uppercase font-bold tracking-widest">{{ Auth::user()->role }}</div>
                        </div>
                        <div class="relative" x-data="{ open: false }">
                            @if(Auth::user()->profile_picture)
                                <img @click="open = !open" src="{{ asset('storage/'.Auth::user()->profile_picture) }}" class="w-10 h-10 rounded-full border-2 border-white cursor-pointer hover:scale-105 transition-transform shadow-sm object-cover">
                            @else
                                <img @click="open = !open" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=012b6e&color=fff" class="w-10 h-10 rounded-full border-2 border-white cursor-pointer hover:scale-105 transition-transform shadow-sm">
                            @endif
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-3 w-48 bg-white rounded-md shadow-xl py-2 z-[60] border text-gray-700" x-cloak x-transition>
                                <div class="px-4 py-2 border-b mb-1">
                                    <p class="text-xs font-bold">{{ Auth::user()->name }}</p>
                                    <p class="text-[10px] text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 transition-colors">My Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-red-600 transition-colors">Sign Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex flex-1 overflow-hidden">
                <!-- Sidebar -->
                <aside
                    class="w-64 flex-shrink-0 fixed lg:static inset-y-0 left-0 z-40 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:block bg-brand-blue"
                    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                >
                    @include('layouts.sidebar')
                </aside>

                <!-- Mobile Overlay -->
                <div
                    x-show="sidebarOpen"
                    @click="sidebarOpen = false"
                    class="fixed inset-0 bg-black bg-opacity-60 z-30 lg:hidden"
                    x-transition:enter="transition opacity-100 ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition opacity-100 ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                ></div>

                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto bg-[#f4f7fa] flex flex-col transition-all duration-300" id="pjax-container">
                    <div class="p-8 max-w-[1600px] flex-1">
                        <!-- Content Header -->
                        @if(!isset($hideHeader))
                            <div class="flex justify-between items-center mb-8">
                                <div>
                                    <h1 class="text-2xl font-black text-gray-800 tracking-tight">{{ $header ?? 'Dashboard' }}</h1>
                                    @if(request()->routeIs('dashboard'))
                                        <p class="text-xs font-bold text-gray-400 mt-1 uppercase tracking-wider">Welcome back, {{ auth()->user()->role }}!</p>
                                    @endif
                                </div>
                                @if(isset($actions))
                                    <div class="flex space-x-3">
                                        {{ $actions }}
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Main Slot -->
                        <div class="animate-fadeIn">
                            @if(session('success'))
                                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative text-xs font-bold uppercase tracking-widest shadow-sm flex items-center" x-data="{ show: true }" x-show="show">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    {{ session('success') }}
                                    <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative text-xs font-bold uppercase tracking-widest shadow-sm flex items-center" x-data="{ show: true }" x-show="show">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ session('error') }}
                                    <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </div>
                            @endif

                            {{ $slot }}
                        </div>
                    </div>

                    <footer class="bg-[#ff7f00] text-white py-8 px-4 mt-auto">
                        <div class="max-w-7xl mx-auto text-center space-y-2">
                            <div class="text-[10px] font-black uppercase tracking-[0.2em] opacity-90">
                                © {{ $sysYear }} {{ $sysName }}. All rights reserved.
                            </div>
                            <div class="flex items-center justify-center text-[12px] font-medium tracking-tight">
                                <span class="mr-2">&lt;/&gt;</span>
                                Maintained by <a href="https://ccdi-sorsogon.net/" target="_blank" class="underline hover:text-white hover:opacity-80 transition-opacity ml-1">CCDI Web Development Team</a>
                            </div>
                            <div class="pt-1">
                                <a href="#" class="text-[12px] underline hover:text-white hover:opacity-80 transition-opacity">Reset user tour on this page</a>
                            </div>
                        </div>
                    </footer>
                </main>

                <!-- Calendar Panel -->
                <aside
                    x-show="calendarOpen"
                    x-cloak
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-x-full opacity-0"
                    x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="translate-x-0 opacity-100"
                    x-transition:leave-end="translate-x-full opacity-0"
                    class="w-80 bg-white border-l border-gray-200 overflow-y-auto shadow-2xl z-40 flex-shrink-0"
                >
                    @include('layouts.calendar-panel')
                </aside>

                <!-- Announcements Panel -->
                <aside
                    x-show="announcementsOpen"
                    x-cloak
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-x-full opacity-0"
                    x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="translate-x-0 opacity-100"
                    x-transition:leave-end="translate-x-full opacity-0"
                    class="w-80 bg-white border-l border-gray-200 overflow-y-auto shadow-2xl z-40 flex-shrink-0"
                >
                    @include('layouts.announcements-panel')
                </aside>
            </div>
        </div>

        <script>
            $(document).pjax('a:not([data-pjax="false"])', '#pjax-container');

            $(document).on('pjax:start', function() {
                $('#pjax-container').addClass('pjax-loading');
            });
            // ... (rest of scripts)
        </script>

        <!-- Accessibility Modal -->
        <div x-show="accessibilityOpen"
             x-cloak
             class="fixed inset-0 z-[100] overflow-y-auto"
             aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="accessibilityOpen"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="accessibilityOpen = false"
                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="accessibilityOpen"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="inline-block align-middle bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-brand-blue">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-black text-gray-800 uppercase tracking-tight" id="modal-title">Accessibility Settings</h3>
                                <div class="mt-4">
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-3">Choose System Font</p>
                                    <div class="grid grid-cols-1 gap-3">
                                        <button @click="currentFont = 'font-figtree'; localStorage.setItem('portal-font', 'font-figtree');"
                                                class="flex items-center justify-between p-3 rounded-xl border-2 transition-all font-figtree"
                                                :class="currentFont === 'font-figtree' ? 'border-brand-blue bg-blue-50 text-brand-blue' : 'border-gray-100 hover:border-gray-200 text-gray-700'">
                                            <span class="text-sm font-bold">Figtree (Default)</span>
                                            <template x-if="currentFont === 'font-figtree'">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            </template>
                                        </button>

                                        <button @click="currentFont = 'font-inter'; localStorage.setItem('portal-font', 'font-inter');"
                                                class="flex items-center justify-between p-3 rounded-xl border-2 transition-all font-inter"
                                                :class="currentFont === 'font-inter' ? 'border-brand-blue bg-blue-50 text-brand-blue' : 'border-gray-100 hover:border-gray-200 text-gray-700'">
                                            <span class="text-sm font-bold">Inter (Sans-Serif)</span>
                                            <template x-if="currentFont === 'font-inter'">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            </template>
                                        </button>

                                        <button @click="currentFont = 'font-opensans'; localStorage.setItem('portal-font', 'font-opensans');"
                                                class="flex items-center justify-between p-3 rounded-xl border-2 transition-all font-opensans"
                                                :class="currentFont === 'font-opensans' ? 'border-brand-blue bg-blue-50 text-brand-blue' : 'border-gray-100 hover:border-gray-200 text-gray-700'">
                                            <span class="text-sm font-bold">Open Sans (Readable)</span>
                                            <template x-if="currentFont === 'font-opensans'">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            </template>
                                        </button>

                                        <button @click="currentFont = 'font-merriweather'; localStorage.setItem('portal-font', 'font-merriweather');"
                                                class="flex items-center justify-between p-3 rounded-xl border-2 transition-all font-merriweather"
                                                :class="currentFont === 'font-merriweather' ? 'border-brand-blue bg-blue-50 text-brand-blue' : 'border-gray-100 hover:border-gray-200 text-gray-700'">
                                            <span class="text-sm font-bold">Merriweather (Serif)</span>
                                            <template x-if="currentFont === 'font-merriweather'">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            </template>
                                        </button>

                                        <button @click="currentFont = 'font-mono'; localStorage.setItem('portal-font', 'font-mono');"
                                                class="flex items-center justify-between p-3 rounded-xl border-2 transition-all font-mono"
                                                :class="currentFont === 'font-mono' ? 'border-brand-blue bg-blue-50 text-brand-blue' : 'border-gray-100 hover:border-gray-200 text-gray-700'">
                                            <span class="text-sm font-bold">JetBrains Mono (Coding)</span>
                                            <template x-if="currentFont === 'font-mono'">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            </template>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                                @click="accessibilityOpen = false"
                                class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-brand-blue text-base font-black text-white hover:bg-opacity-90 focus:outline-none sm:ml-3 sm:w-auto sm:text-xs uppercase tracking-widest">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
