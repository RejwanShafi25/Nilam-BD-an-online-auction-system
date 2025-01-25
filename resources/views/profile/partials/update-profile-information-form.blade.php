<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Avatar Section -->
        <div class="text-center mb-4">
            @if (auth()->user()->avatar)
                <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" alt="Avatar" class="rounded-circle" style="width: 150px; height: 150px;">
            @else
                <img src="https://via.placeholder.com/150/808080/FFFFFF?text=No+Avatar" alt="Default Avatar" class="rounded-circle" style="width: 150px; height: 150px;">
            @endif
        </div>

        <!-- Disabled Name Field -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" disabled />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Disabled Email Field -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" disabled />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Username Field -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>
        <!-- Adress field -->
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <!-- Avatar Upload Field -->
        <div>
            <x-input-label for="avatar" :value="__('Profile Picture')" />
            <input id="avatar" type="file" name="avatar" class="mt-1 block w-full">
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
