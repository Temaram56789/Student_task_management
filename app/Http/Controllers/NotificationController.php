<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class NotificationController extends Controller
{
    // Display notifications for tasks due tomorrow, this week, and this month
    public function index()
    {
        $user_id = auth()->id();
        $tomorrow = Carbon::now()->addDay()->toDateString();
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
    
        $tasksDueTomorrow = Task::where('user_id', $user_id)
            ->whereDate('deadline', $tomorrow)
            ->get();
    
        $dueTomorrowCount = $tasksDueTomorrow->count();
    
        $tasksDueThisWeek = Task::where('user_id', $user_id)
            ->whereBetween('deadline', [$startOfWeek, $endOfWeek])
            ->get();
    
        $tasksDueThisMonth = Task::where('user_id', $user_id)
            ->whereBetween('deadline', [$startOfMonth, $endOfMonth])
            ->get();
    
        return view('notification', compact('tasksDueTomorrow', 'tasksDueThisWeek', 'tasksDueThisMonth', 'dueTomorrowCount'));
    }
}
