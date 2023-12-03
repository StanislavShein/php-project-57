<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use App\Http\Requests\TaskStatusStoreRequest;
use App\Http\Requests\TaskStatusUpdateRequest;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    public function index()
    {
        $taskStatuses = TaskStatus::orderBy('id', 'asc')->paginate();

        return view('task_statuses.index', compact('taskStatuses'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $taskStatus = new TaskStatus();

        return view('task_statuses.create', compact('taskStatus'));
    }

    public function store(TaskStatusStoreRequest $request)
    {
        $data = $request->validated();
        $newStatus = new TaskStatus();
        $newStatus->fill($data);
        $newStatus->save();
        session()->flash('success', __('flash.task_statuses.created'));

        return redirect()->route('task_statuses.index');
    }

    public function edit(TaskStatus $taskStatus)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('task_statuses.edit', compact('taskStatus'));
    }

    public function update(TaskStatusUpdateRequest $request, TaskStatus $taskStatus)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->validated();
        $taskStatus->fill($data);
        $taskStatus->save();
        session()->flash('success', __('flash.task_statuses.edited'));

        return redirect()->route('task_statuses.index');
    }

    public function destroy(TaskStatus $taskStatus)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        if ($taskStatus->tasks()->exists()) {
            session()->flash('error', __('flash.task_statuses.notdeleted'));
            return back();
        }

        $taskStatus->delete();
        session()->flash('success', __('flash.task_statuses.deleted'));

        return redirect()->route('task_statuses.index');
    }
}
