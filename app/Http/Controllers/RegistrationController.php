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

        // Check if already registered
        if ($event->isRegisteredByUser(auth()->id())) {
            return back()->with('error', 'คุณลงทะเบียนกิจกรรมนี้แล้ว');
        }

        // Check seat availability
        if ($event->is_full) {
            return back()->with('error', 'ที่นั่งเต็มแล้ว ไม่สามารถลงทะเบียนได้');
        }

        Registration::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
        ]);

        return back()->with('success', 'ลงทะเบียนสำเร็จ! ยินดีต้อนรับสู่ "' . $event->title . '"');
    }

    public function destroy(Registration $registration)
    {
        // Ensure the user owns this registration
        if ($registration->user_id !== auth()->id()) {
            abort(403);
        }

        $registration->delete();

        return back()->with('success', 'ยกเลิกการลงทะเบียนเรียบร้อยแล้ว');
    }
}
