<div class="flex flex-col w-64 bg-brand-blue text-white h-full custom-scrollbar overflow-y-auto">
    @if(auth()->user()->role === 'student')
        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2">
            STUDENT NAVIGATION
        </div>
        <nav class="flex-1 px-3 space-y-1">
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="dashboard">
                Dashboard
            </x-sidebar-link>
            <x-sidebar-link :href="'https://www.ccdisorsogon.edu.ph/'" :active="false" icon="home" data-pjax="false" target="_blank">
                Site home
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="calendarOpen = !calendarOpen; if(calendarOpen) announcementsOpen = false" :href="'#'" :active="false" icon="calendar">
                Calendar
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.courses')" :active="request()->routeIs('student.courses')" icon="courses">
                My courses
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.grades')" :active="request()->routeIs('student.grades')" icon="reports">
                My Grades
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="announcementsOpen = !announcementsOpen; if(announcementsOpen) calendarOpen = false" :href="'#'" :active="false" icon="announcements">
                Announcements
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.messages')" :active="request()->routeIs('student.messages')" icon="activity">
                Messages
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.files')" :active="request()->routeIs('student.files')" icon="reports">
                Files
            </x-sidebar-link>
        </nav>

        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6">
            QUICK ACCESS
        </div>
        <nav class="px-3 space-y-1 pb-20">
            <x-sidebar-link :href="'#'" :active="false" icon="courses">
                Library Resources
            </x-sidebar-link>
            <x-sidebar-link :href="'#'" :active="false" icon="reports">
                Student Handbook
            </x-sidebar-link>
            <x-sidebar-link :href="route('student.support')" :active="request()->routeIs('student.support')" icon="settings">
                Help & Support
            </x-sidebar-link>
        </nav>
    @else
        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2">
            ADMINISTRATOR
        </div>
        <nav class="flex-1 px-3 space-y-1">
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="dashboard">
                Dashboard
            </x-sidebar-link>
            <x-sidebar-link :href="route('users.index')" :active="request()->routeIs('users.*')" icon="users">
                Users
            </x-sidebar-link>
            <x-sidebar-link :href="route('students.index')" :active="request()->routeIs('students.*')" icon="students">
                Students
            </x-sidebar-link>
            <x-sidebar-link :href="route('courses.index')" :active="request()->routeIs('courses.*')" icon="courses">
                Courses
            </x-sidebar-link>
            <x-sidebar-link :href="route('reports.index')" :active="request()->routeIs('reports.*')" icon="reports">
                Reports
            </x-sidebar-link>
            <x-sidebar-link :href="route('settings.index')" :active="request()->routeIs('settings.*')" icon="settings">
                Settings
            </x-sidebar-link>
        </nav>

        <div class="p-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6">
            SYSTEM
        </div>
        <nav class="px-3 space-y-1 pb-20">
            <x-sidebar-link :href="'https://www.ccdisorsogon.edu.ph/'" :active="false" icon="home" data-pjax="false" target="_blank">
                Site home
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="calendarOpen = !calendarOpen; if(calendarOpen) announcementsOpen = false" :href="'#'" :active="false" icon="calendar">
                Calendar
            </x-sidebar-link>
            <x-sidebar-link @click.prevent="announcementsOpen = !announcementsOpen; if(announcementsOpen) calendarOpen = false" :href="'#'" :active="false" icon="announcements">
                Announcements
            </x-sidebar-link>
        </nav>
    @endif

    <div @click="accessibilityOpen = true" class="fixed bottom-0 w-64 bg-brand-teal p-3 flex items-center cursor-pointer hover:bg-opacity-90 transition-all z-50">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="text-xs font-bold uppercase tracking-wider">Accessibility settings</span>
    </div>
</div>
