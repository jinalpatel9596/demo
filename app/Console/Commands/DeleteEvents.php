<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class DeleteEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Events Older Than passed date.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $endDate = $this->ask('Enter End Date with format YYYY-MM-DD: ');

        $validator = Validator::make([
            'end_date' => $endDate
        ], [
            'end_date' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            $this->error('Please enter date with proper format.');

            return 1;
        }

        Event::where('end_date', '<=', $endDate)->delete();

        $this->info('Events deleted older than '. $endDate . '.');
    }
}
