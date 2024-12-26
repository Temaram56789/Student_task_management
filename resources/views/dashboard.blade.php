<x-app-layout>
        <h2 class="font-semibold text-2xl text-center flex justify-center items-center leading-tight bg-[#232c58] w-screen text-white h-[8vh]">
            {{ __('Dashboard') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Berhasil nih login") }}
                    <br>
                    <a href='/tasks' class="text-blue-500">Langsung ke task list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
