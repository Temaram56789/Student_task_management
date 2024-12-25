<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Display a listing of the tasks.
    public function index(Request $request)
    {
        $user_id = auth()->id();
    
        // Retrieve selected category from the request
        $category = $request->get('category', null);
    
        // Retrieve tasks filtered by user and optionally by category
        $tasks = Task::where('user_id', $user_id)
                     ->when($category, function ($query, $category) {
                         return $query->where('category', $category);
                     })
                     ->get();
    
        return view('tasks.index', compact(['tasks', 'user_id', 'category']));
    }
    

    // Show the form for creating a new task.
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:kuliah,project,uts,uas',
            'deadline' => 'required|date',
        ]);

        $user_id  = auth()->id();

        Task::create([
            'name' => $request->name,
            'category' => $request->category,
            'deadline' => $request->deadline,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Display the specified task.
    public function show(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.show', compact('task'));
    }

    // Show the form for editing the specified task.
    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        if ($task->deadline) {
            // Ensure the date is in the correct format for Carbon
            $task->deadline = Carbon::createFromFormat('Y-d-m', $task->deadline)->format('Y-m-d');
        }
        return view('tasks.edit', compact('task'));
    }

    // Update the specified task in storage.
    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:kuliah,project,uts,uas',
            'deadline' => 'required|date',
        ]);

        $task->update($request->only('name', 'category', 'deadline'));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Remove the specified task from storage.
    public function destroy(Task $task)
    {
        $this->authorizeTask($task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    // Ensure the user owns the task.
    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
