<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-center font-semibold text-xl text-gray-800 leading-tight">DEADLINE DUE TOMORROW</h3>
                    @if ($tasksDueTomorrow->isEmpty())
                        <p>No assignments are due tomorrow.</p>
                    @else
                        <ul>
                            @foreach ($tasksDueTomorrow as $task)
                                <li>
                                    <strong>{{ $task->name }}</strong>
                                    (Category: {{ ucfirst($task->category) }}, 
                                    Deadline: {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }})
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
