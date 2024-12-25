<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\TaskDueNotification;

class SendTaskDueNotifications extends Command
{
    protected $signature = 'tasks:notify-due-tomorrow';
    protected $description = 'Notify users of tasks that are due tomorrow';

    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $tasks = Task::where('deadline', Carbon::tomorrow())->get();
        
        foreach ($tasks as $task) {
            // Send notification to the user
            $task->user->notify(new TaskDueNotification($task)); // Send notification to the user
        }

        $this->info('Notifications sent for tasks due tomorrow.');
    }
}
