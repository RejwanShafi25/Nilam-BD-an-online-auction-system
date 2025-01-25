<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-3">
            {{ __('Update Password') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('user.updatePassword') }}">
    @csrf
    <!-- Current Password -->
    <div class="mt-4">
        <x-input-label for="current_password" :value="__('Current Password')" />
        <x-text-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required />
        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
    </div>

    <!-- New Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('New Password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm New Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Update Password') }}
        </x-primary-button>
    </div>
</form>
</section>
