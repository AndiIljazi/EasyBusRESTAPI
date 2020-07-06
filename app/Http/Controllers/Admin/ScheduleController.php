<?php

namespace App\Http\Controllers\Admin;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request, Agency $agency)
    {
        $validated = $request->validate([
            'start_location' => 'required',
            'end_location' => 'required',
            'time' => 'required'
        ]);

        $agency->schedule()->create($validated);

        return back()->with(['success' => 'Schedule Created']);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return back()->with(['error' => 'Schedule Deleted']);
    }
}
