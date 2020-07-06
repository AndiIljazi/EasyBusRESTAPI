<?php

namespace App\Http\Controllers\Admin;

use App\Agency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();

        return view('admin.agencies.index', compact('agencies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'contact' => 'sometimes'
        ]);

        Agency::create($validated);

        return back()->with(['success' => 'Agency Created']);
    }

    public function edit(Agency $agency)
    {
        $schedules = $agency->schedule()->get();

        return view('admin.agencies.edit', ['agency' => $agency, 'schedules' => $schedules]);
    }

    public function update(Request $request, Agency $agency)
    {
        $validated = $request->validate([
            'name' => 'required',
            'contact' => 'sometimes'
        ]);

        $agency->update($validated);

        return back()->with(['info' => 'Agency updated']);
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();

        return redirect()->route('admin.agencies.index')->with(['error' => 'Agency Deleted']);
    }
}
