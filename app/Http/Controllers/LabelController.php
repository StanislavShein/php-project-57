<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Http\Requests\LabelStoreRequest;
use App\Http\Requests\LabelUpdateRequest;
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

    public function store(LabelStoreRequest $request)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->validated();
        $newLabel = new Label();
        $newLabel->fill($data);
        $newLabel->save();
        session()->flash('success', __('flash.labels.created'));

        return redirect()->route('labels.index');
    }

    public function edit(Label $label)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('labels.edit', compact('label'));
    }

    public function update(LabelUpdateRequest $request, Label $label)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = $request->input();
        $label->fill($data);
        $label->save();
        session()->flash('success', __('flash.labels.edited'));

        return redirect()->route('labels.index');
    }

    public function destroy(Label $label)
    {
        if (Auth::guest()) {
            return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        if ($label->tasks()->exists()) {
            session()->flash('error', __('flash.labels.notdeleted'));
            return back();
        }

        $label->delete();
        session()->flash('success', __('flash.labels.deleted'));

        return redirect()->route('labels.index');
    }
}
