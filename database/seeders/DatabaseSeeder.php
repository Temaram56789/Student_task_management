<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 1
        ]);

        Task::factory()->create(
            [
                'name' => 'membuat web dengan laravel',
                'category' => 'uas',
                'deadline' => Carbon::createFromFormat('Y-d-m', '2024-27-12')->format('Y-m-d'),  // Converts to '2024-12-27'
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
