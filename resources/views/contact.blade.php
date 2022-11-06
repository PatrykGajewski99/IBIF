<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

                    <x-guest-layout>
                        <x-auth-card>
                            <x-slot name="logo">
                                <strong>{{__('Contact Form')}}</strong>
                            </x-slot>

                            <form method="POST" action="{{ route('send.email',app()->getLocale()) }}">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('First name and last name')" />

                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />

                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Subject -->
                                <div>
                                    <x-input-label for="subject" :value="__('Subject')" />

                                    <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required autofocus />

                                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                </div>

                                <!-- Message -->
                                <div>
                                    <x-input-label for="message" :value="__('Message')" />

                                    <x-text-input id="message" class="block mt-3 w-full" type="text" name="message" :value="old('message')" required autofocus />

                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">

                                    <x-primary-button class="ml-4">
                                        {{ __('SEND') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-auth-card>
                        @include('sweetalert::alert')
                    </x-guest-layout>
</x-app-layout>
