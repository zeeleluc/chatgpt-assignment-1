<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-alert-success :alert="session('success')" />
                    <x-alert-error :alert="session('error')" />

                    <div class="sm:col-span-4">
                        <x-link-button href="{{ route('tasks.create') }}">
                            {{ __('Create Task') }}
                        </x-link-button>
                    </div>

                    <table class="table-auto">
                        <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="p-2 w-25">{{ $task->title }}</td>
                                <td class="p-2 w-50">{{ $task->description }}</td>
                                <td class="p-2">{{ $task->status_readable }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
