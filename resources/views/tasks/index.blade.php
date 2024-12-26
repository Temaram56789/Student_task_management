<x-app-layout>
        <h2 class="font-semibold text-2xl text-center flex justify-center items-center leading-tight bg-[#232c58] w-screen text-white h-[8vh]">
            {{ __('Pengaturan Tugas') }}
        </h2>

    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <!-- Button for creating a new task -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-700">Tugas</h3>

            <div class="flex flex-row gap-2 items-center">
                <a href="{{ route('tasks.create') }}">
                    <button type="button" class="text-white bg-[#232c58] hover:bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2">
                        + Tugas
                    </button>
                </a>

                <form method="GET" action="{{ route('tasks.index') }}" class="flex flex-col text-start items-center relative">
                    <h1 class="absolute bottom-10 left-0 opacity-50">Filter Kategori</h1>
                    <select name="category" id="category" class="border border-gray-300 rounded-lg h-10 bg-[#232c58] text-white" onchange="this.form.submit()">
                        <option value="" {{ request('category') == '' ? 'selected' : '' }}>Semua</option>
                        <option value="kuliah" {{ request('category') == 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                        <option value="project" {{ request('category') == 'project' ? 'selected' : '' }}>Project</option>
                        <option value="uts" {{ request('category') == 'uts' ? 'selected' : '' }}>UTS</option>
                        <option value="uas" {{ request('category') == 'uas' ? 'selected' : '' }}>UAS</option>
                    </select>
                </form>
            </div>
            
        </div>

        <!-- Filter Dropdown -->
       

        <!-- Task Cards -->
        <div class="grid grid-cols-1 gap-6">
            @forelse ($tasks as $task)

            <div class="flex flex-row items-center gap-4 justify-between hover:bg-[#f0ececef] bg-[#f3f4f6] p-2 rounded-lg">

                <div class="flex flex-row gap-4 items-center">
                    <div class="flex items-center space-x-2 gap-2">
                        <input type="checkbox" id="confirm-delete-{{ $task->id }}" class="checkbox-delete w-5 h-5 peer text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    </div>
    
                    <div class="flex flex-col">
                        <h4 class="text-lg font-semibold text-blue-600">
                            <a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a>
                        </h4>
                        <p class="text-sm opacity-50">
                            {{ ucfirst($task->category) }}
                        </p>
                    </div>

                </div>
                
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-blue-400">
                        {{ \Carbon\Carbon::parse($task->deadline)->format('d M, Y') }}
                    </p>

                    <div class="flex flex-row items-center justify-end gap-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:underline text-sm">
                            ✍️
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return validateDelete({{ $task->id }})">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm disabled:opacity-50" disabled id="delete-button-{{ $task->id }}">
                                ❌
                            </button>
                        </form>
                    </div>
                </div>
            </div>
                {{-- <div class="p-4 bg-white rounded-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">
                                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a>
                            </h4>
                            <p class="text-sm text-gray-600">
                                {{ ucfirst($task->category) }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-blue-400">
                                {{ \Carbon\Carbon::parse($task->deadline)->format('d M, Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:underline text-sm">
                            Edit tugas
                        </a>
                        <div class="flex items-center space-x-2 gap-2">
                            <input type="checkbox" id="confirm-delete-{{ $task->id }}" class="checkbox-delete w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return validateDelete({{ $task->id }})">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm disabled:opacity-50" disabled id="delete-button-{{ $task->id }}">
                                    Hapus tugas
                                </button>
                            </form>
                        </div>
                    </div>
                </div> --}}
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-500">
                    No tasks available.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteCheckboxes = document.querySelectorAll('.checkbox-delete');
        
        deleteCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const taskId = this.id.split('-').pop();
                const deleteButton = document.getElementById(`delete-button-${taskId}`);
                deleteButton.disabled = !this.checked;
            });
        });
    });

    function validateDelete(taskId) {
        const checkbox = document.getElementById(`confirm-delete-${taskId}`);
        if (!checkbox.checked) {
            alert('Please confirm by checking the box before deleting.');
            return false;
        }
        return true;
    }
</script>