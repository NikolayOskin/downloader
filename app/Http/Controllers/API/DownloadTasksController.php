<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDownloadTaskRequest;
use App\Jobs\DownloadTaskJob;
use App\Models\DownloadTask;

class DownloadTasksController extends Controller
{
    public function index()
    {
        $tasks = DownloadTask::all();
        return response()->json($tasks, 200);
    }

    public function store(CreateDownloadTaskRequest $request)
    {
        $task = DownloadTask::create($request->validated());
        DownloadTaskJob::dispatch($task);

        return response()->json(['success' => 'Download task added'], 200);
    }
}
