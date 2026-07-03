<div class="flex flex-col bg-brand-blue text-white h-full custom-scrollbar overflow-y-auto transition-all duration-300" :class="sidebarMinimized ? 'w-20' : 'w-64'">
    @if(auth()->user()->role === 'student')
        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2 truncate" x-show="!sidebarMinimized">
            STUDENT NAVIGATION
        </div>
        <nav class="flex-1 px-3 space-y-1">
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="dashboard">
                <span x-show="!sidebarMinimized">Dashboard</span>
            </x-sidebar-link>
            <x-sidebar-link :href="'https://www.ccdisorsogon.edu.ph/'" :active="false" icon="home" data-pjax="false" target="_blank">
                <span x-show="!sidebarMinimized">Site home</span>
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="calendarOpen = !calendarOpen; if(calendarOpen) announcementsOpen = false" :href="'#'" :active="false" icon="calendar">
                <span x-show="!sidebarMinimized">Calendar</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.courses')" :active="request()->routeIs('student.courses')" icon="courses">
                <span x-show="!sidebarMinimized">My courses</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.grades')" :active="request()->routeIs('student.grades')" icon="reports">
                <span x-show="!sidebarMinimized">My Grades</span>
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="announcementsOpen = !announcementsOpen; if(announcementsOpen) calendarOpen = false" :href="'#'" :active="false" icon="announcements">
                <span x-show="!sidebarMinimized">Announcements</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.messages')" :active="request()->routeIs('student.messages')" icon="activity">
                <span x-show="!sidebarMinimized">Messages</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.files')" :active="request()->routeIs('student.files')" icon="reports">
                <span x-show="!sidebarMinimized">Files</span>
            </x-sidebar-link>
        </nav>

        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6 truncate" x-show="!sidebarMinimized">
            QUICK ACCESS
        </div>
        <nav class="px-3 space-y-1 pb-20">
            <x-sidebar-link :href="'#'" :active="false" icon="courses">
                <span x-show="!sidebarMinimized">Library Resources</span>
            </x-sidebar-link>
            <x-sidebar-link :href="'#'" :active="false" icon="reports">
                <span x-show="!sidebarMinimized">Student Handbook</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.support')" :active="request()->routeIs('student.support')" icon="settings">
                <span x-show="!sidebarMinimized">Help & Support</span>
            </x-sidebar-link>
        </nav>
    @else
        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2 truncate" x-show="!sidebarMinimized">
            ADMINISTRATOR
        </div>
        <nav class="flex-1 px-3 space-y-1">
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="dashboard">
                <span x-show="!sidebarMinimized">Dashboard</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('users.index')" :active="request()->routeIs('users.*')" icon="users">
                <span x-show="!sidebarMinimized">Users</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('students.index')" :active="request()->routeIs('students.*')" icon="students">
                <span x-show="!sidebarMinimized">Students</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('courses.index')" :active="request()->routeIs('courses.*')" icon="courses">
                <span x-show="!sidebarMinimized">Courses</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('reports.index')" :active="request()->routeIs('reports.*')" icon="reports">
                <span x-show="!sidebarMinimized">Reports</span>
            </x-sidebar-link>
            <x-sidebar-link :href="route('settings.index')" :active="request()->routeIs('settings.*')" icon="settings">
                <span x-show="!sidebarMinimized">Settings</span>
            </x-sidebar-link>
        </nav>

        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6 truncate" x-show="!sidebarMinimized">
            SYSTEM
        </div>
        <nav class="px-3 space-y-1 pb-20">
            <x-sidebar-link :href="'https://www.ccdisorsogon.edu.ph/'" :active="false" icon="home" data-pjax="false" target="_blank">
                <span x-show="!sidebarMinimized">Site home</span>
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="calendarOpen = !calendarOpen; if(calendarOpen) announcementsOpen = false" :href="'#'" :active="false" icon="calendar">
                <span x-show="!sidebarMinimized">Calendar</span>
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="announcementsOpen = !announcementsOpen; if(announcementsOpen) calendarOpen = false" :href="'#'" :active="false" icon="announcements">
                <span x-show="!sidebarMinimized">Announcements</span>
            </x-sidebar-link>
        </nav>
    @endif

    <div @click="accessibilityOpen = true" class="fixed bottom-0 transition-all duration-300 bg-brand-teal p-3 flex items-center cursor-pointer hover:bg-opacity-90 z-50 overflow-hidden" :class="sidebarMinimized ? 'w-20' : 'w-64'">
        <svg class="w-5 h-5 flex-shrink-0" :class="sidebarMinimized ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="text-xs font-bold uppercase tracking-wider truncate" x-show="!sidebarMinimized">Accessibility settings</span>
    </div>
</div>
