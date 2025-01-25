<section class="mt-4">
    <header>
        <h2 class="text-lg font-medium text-danger mb-3">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-muted">
            {{ __('Once your account is deleted, all resources will be permanently deleted. Please download any important data before proceeding.') }}
        </p>
    </header>

    <button class="btn btn-danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')

            <h5 class="text-danger">
                {{ __('Are you sure you want to delete your account?') }}
            </h5>
            <p class="text-muted mb-3">
                {{ __('This action cannot be undone. Please enter your password to confirm.') }}
            </p>

            <div class="mb-3">
                <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" x-on:click="$dispatch('close')">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
            </div>
        </form>
    </x-modal>
</section>
