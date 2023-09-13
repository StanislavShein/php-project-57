<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Taskstatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'asc')->paginate();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }
        $task = new Task();
        $statuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('tasks.create', compact('task', 'statuses', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $newTask = new Task();
        $newTask->fill($data);
        $user = Auth::user();
        $newTask->created_by_id = $user->id;
        $newTask->save();

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $statuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'statuses', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->input();
        $task->fill($data);
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if (Auth::guest() || Auth::user()->id !== $task->creator->id) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $task->delete();

        return redirect()->route('tasks.index');
    }
}
