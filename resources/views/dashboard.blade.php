<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <!-- Stats Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
            <!-- Total Students -->
            <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow">
                <div class="bg-blue-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path></svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Total Students</div>
                    <div class="text-2xl font-black text-gray-800">{{ number_format($stats['total_students']) }}</div>
                    <div class="text-[10px] text-green-500 font-bold">↑ 32 this month</div>
                </div>
            </div>

            <!-- Total Courses -->
            <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow">
                <div class="bg-green-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"></path><path d="M3.88 12.88L12 17.3l8.12-4.42V14.12L12 18.54l-8.12-4.42v-1.24z"></path></svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Total Courses</div>
                    <div class="text-2xl font-black text-gray-800">{{ number_format($stats['total_courses']) }}</div>
                    <div class="text-[10px] text-green-500 font-bold">↑ 5 this month</div>
                </div>
            </div>

            <!-- Active Enrollments -->
            <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow">
                <div class="bg-orange-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"></path></svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Active Enrollments</div>
                    <div class="text-2xl font-black text-gray-800">2,354</div>
                    <div class="text-[10px] text-green-500 font-bold">↑ 85 this month</div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow">
                <div class="bg-purple-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Total Users</div>
                    <div class="text-2xl font-black text-gray-800">152</div>
                    <div class="text-[10px] text-purple-500 font-bold">↑ 12 this month</div>
                </div>
            </div>

            <!-- Reports Generated -->
            <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow">
                <div class="bg-red-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"></path></svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Reports Generated</div>
                    <div class="text-2xl font-black text-gray-800">34</div>
                    <div class="text-[10px] text-gray-500 font-bold italic">This month</div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Recent Enrollments Table -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50 bg-opacity-30">
                    <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Recent Enrollments</h3>
                    <a href="{{ route('students.index') }}" class="text-[9px] font-black text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full uppercase tracking-widest hover:bg-blue-100 transition-colors">View all students</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] text-gray-400 uppercase tracking-widest border-b border-gray-50">
                                <th class="px-6 py-4 font-bold">Student Name</th>
                                <th class="px-6 py-4 font-bold">Course</th>
                                <th class="px-6 py-4 font-bold">Year Level</th>
                                <th class="px-6 py-4 font-bold">Date Enrolled</th>
                                <th class="px-6 py-4 font-bold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @php
                                $enrollments = [
                                    ['name' => 'Juan Dela Cruz', 'course' => 'Special Topics in IT 3C', 'year' => '3rd Year', 'date' => 'May 28, 2025', 'status' => 'Active', 'color' => 'bg-green-400'],
                                    ['name' => 'Maria Santos', 'course' => 'Data Structures and Algorithms', 'year' => '2nd Year', 'date' => 'May 27, 2025', 'status' => 'Active', 'color' => 'bg-blue-400'],
                                    ['name' => 'Pedro Reyes', 'course' => 'Database Systems', 'year' => '3rd Year', 'date' => 'May 27, 2025', 'status' => 'Active', 'color' => 'bg-yellow-400'],
                                    ['name' => 'Ana Garcia', 'course' => 'Web Systems and Technologies', 'year' => '2nd Year', 'date' => 'May 27, 2025', 'status' => 'Active', 'color' => 'bg-purple-400'],
                                    ['name' => 'Kevin Lopez', 'course' => 'Networking 2', 'year' => '4th Year', 'date' => 'May 27, 2025', 'status' => 'Active', 'color' => 'bg-orange-400'],
                                ];
                            @endphp
                            @foreach($enrollments as $e)
                            <tr class="text-[11px] hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full {{ $e['color'] }} flex items-center justify-center text-white font-bold text-[10px] shadow-sm">
                                        {{ strtoupper(substr($e['name'], 0, 1)) . strtoupper(substr(strrchr($e['name'], ' '), 1, 1)) }}
                                    </div>
                                    <span class="font-bold text-gray-700">{{ $e['name'] }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 font-medium">{{ $e['course'] }}</td>
                                <td class="px-6 py-4 text-gray-400 font-bold">{{ $e['year'] }}</td>
                                <td class="px-6 py-4 text-gray-400 font-medium">{{ $e['date'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-50 text-green-600 px-2.5 py-1 rounded text-[9px] font-black uppercase tracking-widest border border-green-100">Active</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- System Overview (Ring Chart) -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 flex flex-col">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px] mb-8">System Overview</h3>
                <div class="flex flex-col items-center flex-1">
                    <!-- Ring Chart with conic-gradient -->
                    <div class="relative w-44 h-44 rounded-full flex items-center justify-center shadow-inner"
                         style="background: conic-gradient(#3b82f6 0% 48.6%, #10b981 48.6% 82.2%, #f59e0b 82.2% 92.7%, #8b5cf6 92.7% 97.7%, #ef4444 97.7% 100%);">
                        <!-- White center to make it a ring -->
                        <div class="absolute w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-sm">
                            <div class="text-center">
                                <div class="text-2xl font-black text-gray-800 leading-tight">100%</div>
                                <div class="text-[8px] text-gray-400 uppercase font-bold tracking-widest">Data Capacity</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 w-full space-y-3">
                        <div class="flex items-center justify-between text-[10px] font-bold">
                            <div class="flex items-center uppercase tracking-tighter"><span class="w-2.5 h-2.5 rounded-sm bg-blue-500 mr-2 shadow-sm"></span> Students</div>
                            <div class="text-gray-400">1,248 (48.6%)</div>
                        </div>
                        <div class="flex items-center justify-between text-[10px] font-bold">
                            <div class="flex items-center uppercase tracking-tighter"><span class="w-2.5 h-2.5 rounded-sm bg-green-500 mr-2 shadow-sm"></span> Courses</div>
                            <div class="text-gray-400">86 (33.6%)</div>
                        </div>
                        <div class="flex items-center justify-between text-[10px] font-bold">
                            <div class="flex items-center uppercase tracking-tighter"><span class="w-2.5 h-2.5 rounded-sm bg-yellow-500 mr-2 shadow-sm"></span> Enrollments</div>
                            <div class="text-gray-400">2,354 (10.5%)</div>
                        </div>
                        <div class="flex items-center justify-between text-[10px] font-bold">
                            <div class="flex items-center uppercase tracking-tighter"><span class="w-2.5 h-2.5 rounded-sm bg-purple-500 mr-2 shadow-sm"></span> Users</div>
                            <div class="text-gray-400">152 (5.0%)</div>
                        </div>
                        <div class="flex items-center justify-between text-[10px] font-bold text-red-500">
                            <div class="flex items-center uppercase tracking-tighter"><span class="w-2.5 h-2.5 rounded-sm bg-red-500 mr-2 shadow-sm"></span> Others</div>
                            <div class="text-gray-400">24 (2.3%)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Activity Logs -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50 bg-opacity-30">
                    <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">Recent Activity Logs</h3>
                    <a href="#" class="text-[9px] font-black text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full uppercase tracking-widest hover:bg-blue-100 transition-colors">View all logs</a>
                </div>
                <div class="p-6 space-y-6 flex-1">
                    <div class="flex space-x-4 group cursor-pointer">
                        <div class="bg-green-50 p-2 rounded-lg h-10 w-10 flex items-center justify-center shrink-0 text-green-600 group-hover:bg-green-100 transition-colors border border-green-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-800"><span class="text-blue-600">Admin User</span> added a new course</div>
                            <div class="text-[10px] text-gray-400 font-medium">Special Topics in IT 3C</div>
                            <div class="text-[9px] text-gray-300 mt-1 uppercase font-black tracking-widest">10 mins ago</div>
                        </div>
                    </div>

                    <div class="flex space-x-4 group cursor-pointer">
                        <div class="bg-blue-50 p-2 rounded-lg h-10 w-10 flex items-center justify-center shrink-0 text-blue-600 group-hover:bg-blue-100 transition-colors border border-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-800"><span class="text-blue-600">Admin User</span> enrolled a student</div>
                            <div class="text-[10px] text-gray-400 font-medium">Juan Dela Cruz to IT 3C</div>
                            <div class="text-[9px] text-gray-300 mt-1 uppercase font-black tracking-widest">28 mins ago</div>
                        </div>
                    </div>

                    <div class="flex space-x-4 group cursor-pointer">
                        <div class="bg-orange-50 p-2 rounded-lg h-10 w-10 flex items-center justify-center shrink-0 text-orange-600 group-hover:bg-orange-100 transition-colors border border-orange-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-800"><span class="text-blue-600">Jane Smith</span> updated a student</div>
                            <div class="text-[10px] text-gray-400 font-medium">Old Instructor Account</div>
                            <div class="text-[9px] text-gray-300 mt-1 uppercase font-black tracking-widest">1 hour ago</div>
                        </div>
                    </div>

                    <div class="flex space-x-4 group cursor-pointer">
                        <div class="bg-red-50 p-2 rounded-lg h-10 w-10 flex items-center justify-center shrink-0 text-red-600 group-hover:bg-red-100 transition-colors border border-red-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-gray-800"><span class="text-blue-600">Admin User</span> deleted a student</div>
                            <div class="text-[10px] text-gray-400 font-medium">Old Instructor Account</div>
                            <div class="text-[9px] text-gray-300 mt-1 uppercase font-black tracking-widest">2 hours ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enrollment Overview (Chart) -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-100 p-6 flex flex-col">
                <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px] mb-6">Enrollment Overview <span class="text-[10px] font-medium text-gray-400 italic lowercase">(this semester)</span></h3>
                <div class="relative flex-1 bg-gradient-to-t from-blue-50 to-white rounded-lg border border-blue-50 overflow-hidden min-h-[250px] shadow-inner">
                    <!-- Grid Lines Simulation -->
                    <div class="absolute inset-0 grid grid-cols-6 divide-x divide-blue-100 divide-opacity-30">
                        <div></div><div></div><div></div><div></div><div></div><div></div>
                    </div>
                    <!-- Simulated Line Chart -->
                    <svg class="absolute inset-0 w-full h-full p-10" preserveAspectRatio="none">
                        <path d="M0 200 L100 150 L200 180 L300 120 L400 80 L500 100 L600 20" fill="none" stroke="#3b82f6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M0 200 L100 150 L200 180 L300 120 L400 80 L500 100 L600 20 V250 H0 Z" fill="url(#grad)" fill-opacity="0.1" />
                        <defs>
                            <linearGradient id="grad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:0" />
                            </linearGradient>
                        </defs>
                        <circle cx="0" cy="200" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                        <circle cx="100" cy="150" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                        <circle cx="200" cy="180" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                        <circle cx="300" cy="120" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                        <circle cx="400" cy="80" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                        <circle cx="500" cy="100" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                        <circle cx="600" cy="20" r="5" fill="#3b82f6" stroke="white" stroke-width="2" />
                    </svg>

                    <div class="absolute bottom-4 left-0 right-0 flex justify-between px-10 text-[9px] text-gray-400 font-black uppercase tracking-widest">
                        <span>Jan</span>
                        <span>Feb</span>
                        <span>Mar</span>
                        <span>Apr</span>
                        <span>May</span>
                        <span>Jun</span>
                        <span>Jul</span>
                    </div>
                </div>

                <!-- Top Courses Bar Chart -->
                <div class="mt-8">
                    <h3 class="font-black text-gray-400 uppercase tracking-widest text-[9px] mb-4">Top Courses by Enrollments</h3>
                    <div class="space-y-3">
                        <div class="flex items-center group">
                            <div class="w-36 text-[10px] font-bold text-gray-600 group-hover:text-brand-red transition-colors">Database Systems</div>
                            <div class="flex-1 bg-gray-50 h-2.5 rounded-full overflow-hidden mr-4 border border-gray-100">
                                <div class="bg-brand-red h-full w-[95%] shadow-sm transition-all duration-1000"></div>
                            </div>
                            <div class="text-[10px] font-black text-gray-400">245</div>
                        </div>
                        <div class="flex items-center group">
                            <div class="w-36 text-[10px] font-bold text-gray-600 group-hover:text-brand-red transition-colors">Web Systems and Tech</div>
                            <div class="flex-1 bg-gray-50 h-2.5 rounded-full overflow-hidden mr-4 border border-gray-100">
                                <div class="bg-brand-red h-full w-[88%] shadow-sm transition-all duration-1000"></div>
                            </div>
                            <div class="text-[10px] font-black text-gray-400">230</div>
                        </div>
                        <div class="flex items-center group">
                            <div class="w-36 text-[10px] font-bold text-gray-600 group-hover:text-brand-red transition-colors">Data Structures</div>
                            <div class="flex-1 bg-gray-50 h-2.5 rounded-full overflow-hidden mr-4 border border-gray-100">
                                <div class="bg-brand-red h-full w-[80%] shadow-sm transition-all duration-1000"></div>
                            </div>
                            <div class="text-[10px] font-black text-gray-400">210</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
