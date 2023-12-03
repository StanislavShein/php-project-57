<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $users = User::pluck('name', 'id');
        $statuses = TaskStatus::pluck('name', 'id');
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(
                [
                    AllowedFilter::exact('status_id'),
                    AllowedFilter::exact('created_by_id'),
                    AllowedFilter::exact('assigned_to_id')
                ]
            )
            ->orderBy('id', 'asc')
            ->paginate();

        $filter = $request->filter ?? null;

        return view('tasks.index', compact('tasks', 'statuses', 'users', 'filter'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $statuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');

        return view('tasks.create', compact('statuses', 'users', 'labels'));
    }

    public function store(TaskStoreRequest $request)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->validated();
        $data['created_by_id'] = (int) Auth::id();

        $task = new Task();
        $task->fill($data);
        $task->save();

        if (isset($data['labels'])) {
            $task->label()->attach($data['labels']);
        }

        session()->flash('success', __('flash.tasks.created'));

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
        $labels = Label::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'statuses', 'users', 'labels'));
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->validated();
        $data['created_by_id'] = $task->created_by_id;
        $task->fill($data);

        if (array_key_exists('labels', $data)) {
            $task->labels()->sync($data['labels']);
        }

        $task->save();
        session()->flash('success', __('flash.tasks.edited'));

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if (Auth::guest() || Auth::id() !== $task->created_by_id) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $task->labels()->detach();

        $task->delete();
        session()->flash('success', __('flash.tasks.deleted'));

        return redirect()->route('tasks.index');
    }
}
