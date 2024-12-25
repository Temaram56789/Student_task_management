<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment') }}
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2 pt-2">
        <!-- Button for creating a new task -->
        <a href="{{ route('tasks.create') }}" class="">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4">
                New Assignment
            </button>
        </a>

        <!-- Dropdown for category filtering -->
        <form method="GET" action="{{ route('tasks.index') }}" class="mb-4 flex items-center space-x-2">
            <label for="category" class="text-gray-700">Filter by Category:</label>
            <select name="category" id="category" class="border border-gray-300 rounded-lg p-2 pe-10" onchange="this.form.submit()">
                <option value="" {{ request('category') == '' ? 'selected' : '' }}>All Categories</option>
                <option value="kuliah" {{ request('category') == 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                <option value="project" {{ request('category') == 'project' ? 'selected' : '' }}>Project</option>
                <option value="uts" {{ request('category') == 'uts' ? 'selected' : '' }}>UTS</option>
                <option value="uas" {{ request('category') == 'uas' ? 'selected' : '' }}>UAS</option>
            </select>
        </form>
        <!-- Tasks Table -->
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr>
                        <th class="p-4 border-b">Name</th>
                        <th class="p-4 border-b">Category</th>
                        <th class="p-4 border-b">Deadline</th>
                        <th class="p-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td class="p-4 border-b">
                                <a href="{{ route('tasks.show', $task->id) }}" class="font-medium text-blue-gray-900">
                                    {{ $task->name }}
                                </a>
                            </td>
                            <td class="p-4 border-b">{{ ucfirst($task->category) }}</td>
                            <td class="p-4 border-b">{{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</td>
                            <td class="p-4 border-b flex justify-center space-x-8">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-700">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                               
                            </td>
                          
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center">No tasks available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
