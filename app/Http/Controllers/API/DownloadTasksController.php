<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDownloadTaskRequest;
use App\Models\DownloadTask;

class DownloadTasksController extends Controller
{
    /**
     * @param CreateDownloadTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateDownloadTaskRequest $request)
    {
        $task = DownloadTask::create($request->validated());

        return response()->json(['success' => $task], 200);
    }
}
