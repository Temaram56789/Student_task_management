<x-app-layout>
    <h2
        class="font-semibold text-2xl text-center flex justify-center items-center leading-tight bg-[#232c58] w-screen text-white h-[8vh]">
        >
        {{ __('Edit Task') }}
    </h2>

    <section class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST"
            class="bg-[#232c58] shadow-md rounded-lg p-6 border border-gray-200">
            @csrf
            @method('PUT') <!-- Since it's an update, we need the PUT method -->

            <!-- Task Name -->
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-white">Task Name</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                    value="{{ old('name', $task->name) }}" placeholder="Enter task name" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block mb-2 text-sm font-medium text-white">Category</label>
                <select id="category" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('category') border-red-500 @enderror"
                    required>
                    <option value="kuliah" {{ old('category', $task->category) == 'kuliah' ? 'selected' : '' }}>Kuliah
                    </option>
                    <option value="project" {{ old('category', $task->category) == 'project' ? 'selected' : '' }}>
                        Project</option>
                    <option value="uts" {{ old('category', $task->category) == 'uts' ? 'selected' : '' }}>UTS
                    </option>
                    <option value="uas" {{ old('category', $task->category) == 'uas' ? 'selected' : '' }}>UAS
                    </option>
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deadline -->
            <div class="mb-4">
                <label for="deadline" class="block mb-2 text-sm font-medium text-white">Deadline</label>
                <input type="date" name="deadline" id="deadline"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('deadline') border-red-500 @enderror"
                    value="{{ old('deadline', $task->deadline) }}" required>
                @error('deadline')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4">
                <button type="submit"
                    class="inline-flex justify-center px-5 py-2.5 text-sm font-medium text-white bg-[#1f2852] rounded-lg hover:bg-[#1d2549] focus:ring-4 focus:ring-blue-300">
                    Update Task
                </button>
                <a href="{{ route('tasks.index') }}"
                    class="inline-flex justify-center px-5 py-2.5 text-sm font-medium text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </section>
</x-app-layout>
