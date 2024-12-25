<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class NotificationController extends Controller
{
    // Display notifications for tasks due tomorrow
    public function index()
    {
        $user_id = auth()->id();
        $tomorrow = Carbon::now()->addDay()->toDateString();

        // Get tasks due tomorrow for the authenticated user
        $tasksDueTomorrow = Task::where('user_id', $user_id)
            ->whereDate('deadline', $tomorrow)
            ->get();

        return view('notification', compact('tasksDueTomorrow'));
    }
}
