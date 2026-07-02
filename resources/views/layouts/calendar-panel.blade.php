<div class="p-6" x-data="calendarPanel()">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-black text-gray-800 uppercase tracking-tight">Calendar</h2>
        <button @click="calendarOpen = false" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Mini Calendar -->
    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 mb-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-gray-800 uppercase tracking-widest" x-text="monthName + ' ' + year"></span>
            <div class="flex space-x-2">
                <button @click="prevMonth" class="p-1 hover:bg-gray-200 rounded transition-colors text-gray-600">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="nextMonth" class="p-1 hover:bg-gray-200 rounded transition-colors text-gray-600">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-7 gap-1 text-center mb-2">
            @foreach(['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $day)
                <span class="text-[9px] font-black text-gray-400 uppercase">{{ $day }}</span>
            @endforeach
        </div>
        <div class="grid grid-cols-7 gap-1">
            <template x-for="blank in blankDays">
                <div class="h-8"></div>
            </template>
            <template x-for="day in daysInMonth">
                <div class="h-8 flex items-center justify-center text-[10px] font-bold rounded-lg cursor-pointer transition-all"
                    :class="isToday(day) ? 'bg-brand-red text-white shadow-md' : 'text-gray-600 hover:bg-gray-200'"
                    x-text="day">
                </div>
            </template>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div>
        <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Upcoming Events</h3>
        <div class="space-y-4">
            <div class="flex items-start space-x-3 group cursor-pointer">
                <div class="bg-brand-blue bg-opacity-10 text-brand-blue p-2 rounded-lg group-hover:bg-brand-blue group-hover:text-white transition-all">
                    <span class="text-[10px] font-black leading-none block">15</span>
                    <span class="text-[8px] font-bold uppercase block">Jul</span>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-800 group-hover:text-brand-blue transition-colors">Midterm Examinations</p>
                    <p class="text-[9px] text-gray-500 font-medium">08:00 AM - 05:00 PM</p>
                </div>
            </div>

            <div class="flex items-start space-x-3 group cursor-pointer">
                <div class="bg-brand-teal bg-opacity-10 text-brand-teal p-2 rounded-lg group-hover:bg-brand-teal group-hover:text-white transition-all">
                    <span class="text-[10px] font-black leading-none block">22</span>
                    <span class="text-[8px] font-bold uppercase block">Jul</span>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-800 group-hover:text-brand-teal transition-colors">Faculty Meeting</p>
                    <p class="text-[9px] text-gray-500 font-medium">02:00 PM - 04:00 PM</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calendarPanel() {
            return {
                month: new Date().getMonth(),
                year: new Date().getFullYear(),
                daysInMonth: [],
                blankDays: [],
                monthName: '',

                init() {
                    this.getCalendarDays();
                },

                getCalendarDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                    let dayOfWeek = new Date(this.year, this.month).getDay();

                    let blankDaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankDaysArray.push(i);
                    }

                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankDays = blankDaysArray;
                    this.daysInMonth = daysArray;
                    this.monthName = new Date(this.year, this.month).toLocaleString('default', { month: 'long' });
                },

                prevMonth() {
                    if (this.month === 0) {
                        this.month = 11;
                        this.year--;
                    } else {
                        this.month--;
                    }
                    this.getCalendarDays();
                },

                nextMonth() {
                    if (this.month === 11) {
                        this.month = 0;
                        this.year++;
                    } else {
                        this.month++;
                    }
                    this.getCalendarDays();
                },

                isToday(day) {
                    const today = new Date();
                    return day === today.getDate() &&
                           this.month === today.getMonth() &&
                           this.year === today.getFullYear();
                }
            }
        }
    </script>
</div>
