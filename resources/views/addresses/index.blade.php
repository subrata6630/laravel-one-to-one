<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Address
            </h2>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('address.create') }}">
                Add new Address
            </a>
        </div>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900">
                    {{ $user->address?->address }}

                    @if ($user->address)
                        <a class="text-sm" href="{{ route('address.edit', $user->address) }}">Edit</a>
                        <form action="{{ route('address.destroy', $user->address) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-sm">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
