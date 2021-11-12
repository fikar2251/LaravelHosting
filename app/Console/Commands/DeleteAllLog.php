<?php

namespace App\Console\Commands;

use App\Models\Log;
use Illuminate\Console\Command;

class DeleteAllLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deletealllog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        try {
            $this->line('Run Delete All Log');
            Log::truncate();
            $this->info('Delete Success');
        } catch (\Throwable $th) {
            $this->error('error : '.$th->getMessage());
        }
        return Command::SUCCESS;
    }
}
