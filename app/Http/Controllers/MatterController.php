<?php
namespace App\Http\Controllers;

use App\Models\Matter;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MatterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $matters = Matter::with('client')->latest()->paginate(10);
        return view('matters.index', compact('matters'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('matters.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => ['required','exists:clients,id'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
        ]);

        $number = 'MAT-'.now()->format('Y').'-'.str_pad((string)(Matter::max('id')+1), 4, '0', STR_PAD_LEFT);

        $matter = Matter::create([
            'client_id' => $validated['client_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'number' => $number,
            'status' => 'open',
        ]);

        return redirect()->route('matters.show', $matter)->with('success','Matter created.');
    }

    public function show(Matter $matter)
    {
        $matter->load(['client','tasks','timeEntries','invoices']);
        return view('matters.show', compact('matter'));
    }

    public function edit(Matter $matter)
    {
        $clients = Client::orderBy('name')->get();
        return view('matters.edit', compact('matter','clients'));
    }

    public function update(Request $request, Matter $matter)
    {
        $validated = $request->validate([
            'client_id' => ['required','exists:clients,id'],
            'title' => ['required','string','max:255'],
            'status' => ['required','in:open,on_hold,closed'],
            'description' => ['nullable','string'],
        ]);

        $matter->update($validated);
        return redirect()->route('matters.show', $matter)->with('success','Matter updated.');
    }

    public function destroy(Matter $matter)
    {
        $matter->delete();
        return redirect()->route('matters.index')->with('success','Matter deleted.');
    }
}