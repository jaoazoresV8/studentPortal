<x-app-layout>
    <x-slot name="header">
        System Settings
    </x-slot>

    <div class="max-w-4xl">
        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-8">
                <!-- General Settings -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 bg-gray-50 bg-opacity-30">
                        <h3 class="font-bold text-gray-800 uppercase tracking-widest text-[11px]">General Portal Settings</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="system_name" :value="__('System Name')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                                <x-text-input id="system_name" name="system_name" type="text" class="mt-1 block w-full text-sm" :value="old('system_name', $settings['system_name'] ?? '')" required />
                                <x-input-error :messages="$errors->get('system_name')" class="mt-2" />
                            </div>

                            <div class="border-t pt-6">
                                <x-input-label for="academic_year" :value="__('Academic Year')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                                <x-text-input id="academic_year" name="academic_year" type="text" class="mt-1 block w-full text-sm" :value="old('academic_year', $settings['academic_year'] ?? '')" required />
                                <x-input-error :messages="$errors->get('academic_year')" class="mt-2" />
                            </div>

                            <div class="border-t pt-6">
                                <x-input-label for="system_logo" :value="__('System Logo')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                                <div class="flex items-center space-x-6 mt-2">
                                    <div class="shrink-0 bg-brand-red p-2 rounded-lg">
                                        @if(isset($settings['system_logo']) && $settings['system_logo'] === 'ccdi_logo.png')
                                            <img id="logo_preview" class="h-12 w-auto object-contain" src="{{ asset('ccdi_logo.png') }}" alt="Current Logo" />
                                        @elseif(isset($settings['system_logo']))
                                            <img id="logo_preview" class="h-12 w-auto object-contain" src="{{ asset('storage/'.$settings['system_logo']) }}" alt="Current Logo" />
                                        @else
                                            <div id="logo_preview" class="h-12 w-12 bg-white rounded flex items-center justify-center text-brand-red font-bold">CCDI</div>
                                        @endif
                                    </div>
                                    <label class="block flex-1">
                                        <input type="file" name="system_logo" onchange="previewLogo(event)" class="block w-full text-xs text-slate-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-[10px] file:font-black file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100 transition-all cursor-pointer
                                        "/>
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('system_logo')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-brand-blue text-white px-8 py-2.5 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 shadow-lg shadow-blue-900/20 transition-all">
                        Save System Settings
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('logo_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
