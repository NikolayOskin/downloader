<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDownloadTaskRequest;
use App\Jobs\DownloadTaskJob;
use App\Models\DownloadTask;
use Illuminate\Http\Request;

class DownloadTasksController extends Controller
{
    public function index()
    {
        $tasks = DownloadTask::all();
        return view('tasks', compact('tasks'));
    }

    public function store(CreateDownloadTaskRequest $request)
    {
        $task = DownloadTask::create($request->validated());
        DownloadTaskJob::dispatch($task);

        return redirect('/');
    }
}
