<?php

namespace App\Console\Commands;

use App\Models\DownloadTask;
use Illuminate\Console\Command;

class ShowDownloadTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show download tasks';

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
     * @return mixed
     */
    public function handle()
    {
        $headers = ['ID', 'URL', 'STATUS'];
        $tasks = DownloadTask::all(['id', 'url', 'status'])->toArray();

        $this->table($headers, $tasks);
    }
}
