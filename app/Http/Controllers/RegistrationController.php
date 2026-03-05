<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => ['required', 'exists:events,id'],
        ]);

        $event = Event::findOrFail($request->event_id);
        $user = auth()->user();

        // ลงทะเบียนซ้ำ
        if ($event->isRegisteredByUser($user->id)) {
            return back()->with('error', 'คุณลงทะเบียนกิจกรรมนี้แล้ว');
        }

        // จำกัด 3 กิจกรรม
        if ($user->registrations()->count() >= 3) {
            return back()->with('error', 'คุณสามารถลงทะเบียนได้สูงสุด 3 กิจกรรม');
        }

        // ที่นั่งเต็ม
        if ($event->is_full) {
            return back()->with('error', 'กิจกรรมนี้ที่นั่งเต็มแล้ว');
        }

        Registration::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        return back()->with('success', 'ลงทะเบียนสำเร็จ "' . $event->title . '"');
    }

    public function destroy(Registration $registration)
    {
        if ($registration->user_id !== auth()->id()) {
            abort(403);
        }

        $registration->delete();

        return back()->with('success', 'ยกเลิกการลงทะเบียนสำเร็จ');
    }
}