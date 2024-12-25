<?php

namespace App\Providers;

use App\Console\Commands\SendTaskDueNotifications;
use App\Models\Task;
use App\Notifications\TaskDueNotification;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register commands manually
        $this->commands([
            SendTaskDueNotifications::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Schedule $schedule): void
    {
        $schedule->command('tasks:notify-due-tomorrow')->daily();
    }
}
