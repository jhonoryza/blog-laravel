<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}
    <div class="flex flex-row">
        <ul class="bg-white text-gray-800 p-4">
            <li class="flex flex-row">
                <x-home-icon></x-home-icon><a href="#" class="ml-2 mb-2">Dashboard</a>
            </li>
            <li class="flex flex-row">
                <x-user-icon></x-user-icon><a href="#" class="ml-2 mb-2">Users</a>
            </li>
            <li class="flex flex-row">
                <x-cog-icon></x-cog-icon><a href="#" class="ml-2">Settings</a>
            </li>
        </ul>
    </div>
</x-app-layout>