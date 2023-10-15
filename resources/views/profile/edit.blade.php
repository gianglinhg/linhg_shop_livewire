<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mx-auto">
                @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-10">
                @include('profile.partials.update-password-form')
        </div>

        {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @include('profile.partials.delete-user-form')
        </div> --}}
    </div>
</x-admin-layout>