<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('registrations')->get();

        return view('welcome', compact('events'));
    }

    public function show(Event $event)
    {
        $event->loadCount('registrations');

        $isRegistered = auth()->check()
            ? $event->isRegisteredByUser(auth()->id())
            : false;

        return view('events.show', compact('event', 'isRegistered'));
    }
}