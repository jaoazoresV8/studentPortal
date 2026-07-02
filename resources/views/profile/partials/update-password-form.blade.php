<section x-data="{
    verified: false,
    verifying: false,
    currentPassword: '',
    error: '',
    success: false,
    async verify() {
        if (!this.currentPassword) return;
        this.verifying = true;
        this.error = '';
        this.success = false;

        try {
            const response = await fetch('{{ route('profile.verify-password') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ password: this.currentPassword })
            });

            const data = await response.json();
            if (data.verified) {
                this.verified = true;
                this.success = true;
            } else {
                this.error = 'Incorrect password.';
            }
        } catch (e) {
            this.error = 'An error occurred. Please try again.';
        } finally {
            this.verifying = false;
        }
    }
}">
    <header>
        <h2 class="text-lg font-medium text-gray-900 uppercase tracking-widest font-black text-[11px]">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" data-pjax="false">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
            <div class="flex mt-1 gap-2">
                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="block w-full text-sm"
                    autocomplete="current-password"
                    x-model="currentPassword"
                    ::readonly="verified"
                    ::class="verified ? 'bg-gray-100 cursor-not-allowed' : ''"
                />
                <button
                    type="button"
                    class="bg-brand-blue text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-opacity-90 disabled:opacity-50 transition-all flex items-center shrink-0 shadow-sm"
                    @click="verify"
                    ::disabled="verifying || !currentPassword || verified"
                >
                    <span x-show="!verifying && !verified">Verify</span>
                    <span x-show="verifying">Verifying...</span>
                    <span x-show="verified" class="flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        Verified
                    </span>
                </button>
            </div>
            <p x-show="error" x-text="error" class="text-red-600 text-[10px] mt-2 font-bold uppercase tracking-wider italic" x-cloak></p>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6" ::class="!verified ? 'opacity-50' : ''">
            <div>
                <x-input-label for="update_password_password" :value="__('New Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                <x-text-input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="block mt-1 w-full text-sm"
                    autocomplete="new-password"
                    ::disabled="!verified"
                    required
                />
                <p class="text-[9px] text-gray-400 mt-1 uppercase font-bold italic">Minimum 8 characters required.</p>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-[10px] font-black uppercase tracking-widest text-gray-400" />
                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="block mt-1 w-full text-sm"
                    autocomplete="new-password"
                    ::disabled="!verified"
                    required
                />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4 border-t pt-6">
            <x-primary-button ::disabled="!verified" class="bg-brand-blue hover:bg-opacity-90 shadow-lg shadow-blue-900/20">
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('success'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-[10px] font-bold text-green-600 uppercase tracking-widest"
                >{{ __('Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
