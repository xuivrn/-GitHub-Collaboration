<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Room;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('room')->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('subjects.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:subjects',
            'name' => 'required',
            'units' => 'required|integer',
            'room_id' => 'required|exists:rooms,id',
        ]);
        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject added!');
    }

    public function edit(Subject $subject)
    {
        $rooms = Room::all();
        return view('subjects.edit', compact('subject', 'rooms'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'code' => 'required|unique:subjects,code,' . $subject->id,
            'name' => 'required',
            'units' => 'required|integer',
            'room_id' => 'required|exists:rooms,id',
        ]);
        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject updated!');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted!');
    }
}