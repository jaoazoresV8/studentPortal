<x-app-layout>
    <x-slot name="header">
        Help & Support
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-xl font-black text-gray-800 tracking-tight mb-4">How can we help you?</h2>
            <p class="text-sm text-gray-500 leading-relaxed mb-8">
                Welcome to the CCDI Student Support Center. Here you can find answers to common questions,
                access technical guides, or contact our support team directly.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest">Common Questions</h3>
                    <div class="space-y-3">
                        <details class="group bg-gray-50 rounded-xl border border-gray-100 p-4 cursor-pointer">
                            <summary class="list-none text-xs font-black text-gray-700 flex justify-between items-center uppercase tracking-tight">
                                How to reset my password?
                                <svg class="w-4 h-4 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </summary>
                            <p class="text-xs text-gray-500 mt-3 leading-relaxed">
                                You can reset your password by going to your profile settings. If you forgot your password,
                                please contact the ICT department for a temporary reset link.
                            </p>
                        </details>

                        <details class="group bg-gray-50 rounded-xl border border-gray-100 p-4 cursor-pointer">
                            <summary class="list-none text-xs font-black text-gray-700 flex justify-between items-center uppercase tracking-tight">
                                Where can I see my grades?
                                <svg class="w-4 h-4 transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </summary>
                            <p class="text-xs text-gray-500 mt-3 leading-relaxed">
                                Navigate to "My Grades" in the sidebar to view your academic performance for the current and previous semesters.
                            </p>
                        </details>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest">Contact Support</h3>
                    <div class="bg-brand-blue rounded-2xl p-6 text-white shadow-lg">
                        <p class="text-xs font-bold opacity-80 uppercase tracking-widest mb-4">Contact Us</p>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="bg-white bg-opacity-10 p-2 rounded-lg mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase opacity-60">Official Website</p>
                                    <a href="https://www.ccdisorsogon.edu.ph" target="_blank" class="text-sm font-bold hover:underline">www.ccdisorsogon.edu.ph</a>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-white bg-opacity-10 p-2 rounded-lg mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase opacity-60">Mobile</p>
                                    <p class="text-sm font-bold">(056) 421 5575</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-white bg-opacity-10 p-2 rounded-lg mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase opacity-60">Email Support</p>
                                    <p class="text-sm font-bold">ccdisorsogonadmission@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
