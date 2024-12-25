<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Assignment') }}
        </h2>
    </x-slot>

    <section class=" py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <form action="{{ route('tasks.store') }}" method="POST" class=" bg-white shadow-md rounded-lg p-6 border border-gray-200">
            @csrf
            <!-- Task Name -->
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Task Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}"
                    placeholder="Enter task name"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-700">Category</label>
                <select
                    id="category"
                    name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('category') border-red-500 @enderror"
                    required>
                    <option value="">Select a category</option>
                    <option value="kuliah" {{ old('category') == 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                    <option value="project" {{ old('category') == 'project' ? 'selected' : '' }}>Project</option>
                    <option value="uts" {{ old('category') == 'uts' ? 'selected' : '' }}>UTS</option>
                    <option value="uas" {{ old('category') == 'uas' ? 'selected' : '' }}>UAS</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deadline -->
            <div class="mb-4">
                <label for="deadline" class="block mb-2 text-sm font-medium text-gray-700">Deadline</label>
                <input
                    type="date"
                    name="deadline"
                    id="deadline"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('deadline') border-red-500 @enderror"
                    value="{{ old('deadline') }}"
                    required>
                @error('deadline')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4">
                <button
                    type="submit"
                    class="inline-flex justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Create Task
                </button>
                <a
                    href="{{ route('tasks.index') }}"
                    class="inline-flex justify-center px-5 py-2.5 text-sm font-medium text-gray-800 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </section>
</x-app-layout>