<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // Show all rooms
    public function index()
        {
         $rooms = \App\Models\Room::all();
        return view('admin.rooms', compact('rooms'));
        }   
    

    // Show form to create a new room
    public function create()
    {
        $rooms = \App\Models\Room::all(); 
        return view('admin.create');
    }

    // Store new room data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'type' => 'nullable|string',
            'building' => 'required|string'
        ]);

        // Save
        \App\Models\Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'type' => $request->type,
            'building' => $request->building
        ]);

        // Redirect back to room list or dashboard
        return redirect()->route('admin.dashboard')->with('success', 'Room added successfully!');


        }

    // Edit room
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    // Update room
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'type' => 'nullable|string',
            'building' => 'required|string'
        ]);

        $room->update($request->all());
        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully!');
    }

    // Delete room
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }
}
