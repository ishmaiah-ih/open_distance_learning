<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')"/>
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                          autofocus autocomplete="phone"/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Program -->
        <div class="mt-4">
            <x-input-label for="program" :value="__('Program')"/>
            <x-text-input id="program" class="block mt-1 w-full" type="text" name="program" :value="old('program')"
                          autocomplete="program"/>
            <x-input-error :messages="$errors->get('program')" class="mt-2"/>
        </div>

        <!-- Reg -->
        <div class="mt-4">
            <x-input-label for="reg" :value="__('Registration Number')"/>
            <x-text-input id="reg" class="block mt-1 w-full" type="text" name="reg" :value="old('reg')"
                          autocomplete="reg"/>
            <x-input-error :messages="$errors->get('reg')" class="mt-2"/>
        </div>

        <!-- Year -->
        <div class="mt-4">
            <x-input-label for="year" :value="__('Year')"/>
            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')"
                          autocomplete="year"/>
            <x-input-error :messages="$errors->get('year')" class="mt-2"/>
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')"/>
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                          :value="old('description')" autocomplete="description"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>

        <!-- Role (Hidden Field for Assigning Role Automatically) -->
        <input type="hidden" name="role" value="student" />

        <!-- Picture Upload -->
        <div class="mt-4">
            <x-input-label for="picture" :value="__('Profile Picture')"/>
            <x-text-input id="picture" class="block mt-1 w-full" type="file" name="picture" accept="image/*"/>
            <x-input-error :messages="$errors->get('picture')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                          autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                          name="password_confirmation" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
