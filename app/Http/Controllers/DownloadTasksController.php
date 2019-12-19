<?php

namespace App\Http\Controllers;

use App\Models\DownloadTask;
use Illuminate\Http\Request;

class DownloadTasksController extends Controller
{
    public function index()
    {
        $tasks = DownloadTask::all();

        return view('tasks', compact('tasks'));
    }
}
