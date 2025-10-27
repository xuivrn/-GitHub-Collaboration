<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:rooms',
            'building' => 'required',
            'capacity' => 'required|integer',
        ]);
        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room added!');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'number' => 'required|unique:rooms,number,' . $room->id,
            'building' => 'required',
            'capacity' => 'required|integer',
        ]);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room updated!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted!');
    }
}