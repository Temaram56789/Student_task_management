<x-app-layout>
    <h2
        class="font-semibold text-2xl text-center flex justify-center items-center leading-tight bg-[#232c58] w-screen text-white h-[8vh]">
        {{ __('Notification') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-center font-semibold text-xl text-gray-800 leading-tight">DEADLINES</h3>

                    <h4 class="font-semibold text-2xl text-red-900">Deadline Besok ❗</h4>
                    <hr />
                    @if ($tasksDueTomorrow->isEmpty())
                        <p>Gak ada tugas.</p>
                    @else
                        <ul>
                            @foreach ($tasksDueTomorrow as $task)
                            <li class="flex flex-row justify-between gap-10 bg-[#232c58] px-4 py-2 text-white rounded-lg">
                                <div>
                                    <h1 class="text-lg">{{ $task->name }}</h1>
                                    <p class="text-sky-400 text-sm">
                                        Deadline: {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}
                                    </p>
                                   
                                    
                                </div>
                                <p class="min-w-10 max-w-fit p-2 rounded-lg bg-red-400  flex items-center justify-center">
                                    {{ ucfirst($task->category) }}
                                </p>

                                
                                
                            </li>
                            @endforeach
                        </ul>
                    @endif

                    <h4 class="font-semibold text-sm opacity-50 mt-10">Deadline Minggu ini</h4>
                    <hr />
                    @if ($tasksDueThisWeek->isEmpty())
                        <p>No assignments are due this week.</p>
                    @else
                        <ul class=" flex-row items-center gap-10 w-full grid grid-cols-2">
                            @foreach ($tasksDueThisWeek as $task)
                                <li class="flex flex-row justify-between gap-10 bg-[#232c58] px-4 py-2 text-white rounded-lg">
                                    <div>
                                        <h1 class="text-lg">{{ $task->name }}</h1>
                                        <p class="text-sky-400 text-sm">
                                            Deadline: {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}
                                        </p>
                                       
                                        
                                    </div>
                                    <p class="min-w-10 max-w-fit p-2 rounded-lg bg-red-400  flex items-center justify-center">
                                        {{ ucfirst($task->category) }}
                                    </p>

                                    
                                    
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <h4 class="font-semibold text-sm opacity-50 mt-10">Deadline Bulan ini</h4>
                    <hr />
                    @if ($tasksDueThisMonth->isEmpty())
                        <p>No assignments are due this month.</p>
                    @else
                    <ul class=" flex-row items-center gap-10 w-full grid grid-cols-2">
                        @foreach ($tasksDueThisMonth as $task)
                            <li class="flex flex-row justify-between gap-10 bg-[#232c58] px-4 py-2 text-white rounded-lg">
                                <div>
                                    <h1 class="text-lg">{{ $task->name }}</h1>
                                    <p class="text-sky-400 text-sm">
                                        Deadline: {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}
                                    </p>
                                   
                                    
                                </div>
                                <p class="min-w-10 max-w-fit p-2 rounded-lg bg-red-400  flex items-center justify-center">
                                    {{ ucfirst($task->category) }}
                                </p>

                                
                                
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
