<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::orderBy('id', 'asc')->paginate();

        return view('labels.index', compact('labels'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $label = new Label();

        return view('labels.create', compact('label'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $newLabel = new Label();
        $newLabel->fill($data);
        $newLabel->save();

        return redirect()->route('labels.index');
    }

    public function edit(Label $label)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('labels.edit', compact('label'));
    }

    public function update(Request $request, Label $label)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->input();
        $label->fill($data);
        $label->save();

        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        if ($label->task()->exists()) {
            return back();
        }

        $label->delete();

        return redirect()->route('task_statuses.index');
    }
}