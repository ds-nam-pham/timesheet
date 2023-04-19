<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Timesheet as ModelsTimesheet;
use Illuminate\Console\Command;

class Timesheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timesheet:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        // $timesheet = new ModelsTimesheet();
        $events = new Event();
        $events->title = 'new titke';
        $events->start = now();
        $events->end = now();
        $events->save();
        $this->info('timesheet:auto Cummand Run successfully!');
    }
}
