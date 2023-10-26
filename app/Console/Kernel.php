<?php

namespace App\Console;

use App\Models\Kelas;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        foreach (Kelas::whereNotNull('telegram_group_id')->pluck('id') as $kelas_id) {
            $schedule->command('bot:reminder ' . $kelas_id)->everyFifteenMinutes();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
