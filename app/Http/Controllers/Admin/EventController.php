<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('registrations')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'total_seats' => 'required|integer|min:1',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'เพิ่มกิจกรรมสำเร็จ');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'total_seats' => 'required|integer|min:1',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'แก้ไขข้อมูลกิจกรรมสำเร็จ');
    }

    public function destroy(Event $event)
    {
        // Check if there are registrations before deleting? 
        // Or just let cascade delete handle it if configured?
        // Let's just delete it.
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'ลบกิจกรรมสำเร็จ');
    }
}
