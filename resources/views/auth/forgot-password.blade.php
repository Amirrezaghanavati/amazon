<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
{{--        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
        {{ __('رمز عبور خود را فراموش کرده اید؟ مشکلی ندارد. فقط کافیست که ایمیل خودتان را به ما بگویید تا ما برای شما لینک تغییر رمز عبورتان را ارسال کنیم') }}

    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
{{--            <x-input-label for="email" :value="__('Email')" />--}}
            <x-input-label for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
{{--                {{ __('Email Password Reset Link') }}--}}
                {{ __('ارسال ایمیل تغییر رمز عبور') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
