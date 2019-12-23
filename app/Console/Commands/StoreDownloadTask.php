<?php

namespace App\Console\Commands;

use App\Jobs\DownloadTaskJob;
use App\Models\DownloadTask;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class StoreDownloadTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:url {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create and dispatch download task';

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
        $url = $this->argument('url');
        $validator = Validator::make(['url' => $url], ['url' => 'required|url']);

        if ($validator->fails()) {
            $this->info('Task is not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }

        $task = DownloadTask::create(['url' => $this->argument('url')]);
        DownloadTaskJob::dispatch($task);

        $this->line('Download task created!');
    }
}
