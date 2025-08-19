<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeEntryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matter_id' => ['required','exists:matters,id'],
            'duration_minutes' => ['required','integer','min:1'],
            'rate' => ['required','numeric','min:0'],
            'started_at' => ['nullable','date'],
            'description' => ['nullable','string']
        ]);

        TimeEntry::create($validated + ['user_id' => Auth::id()]);
        return back()->with('success','Time entry added.');
    }
}