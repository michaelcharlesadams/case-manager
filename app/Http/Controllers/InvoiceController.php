<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Matter;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('matter.client')->latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $matters = Matter::with('client')->orderBy('number')->get();
        return view('invoices.create', compact('matters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'matter_id' => ['required','exists:matters,id'],
            'issue_date' => ['required','date'],
            'due_date' => ['nullable','date','after_or_equal:issue_date'],
            'items' => ['required','array','min:1'],
            'items.*.description' => ['required','string'],
            'items.*.quantity' => ['required','numeric','min:0.25'],
            'items.*.unit_rate' => ['required','numeric','min:0'],
        ]);

        $number = 'INV-'.now()->format('Y').'-'.str_pad((string)(Invoice::max('id')+1), 4, '0', STR_PAD_LEFT);

        $invoice = Invoice::create([
            'matter_id' => $validated['matter_id'],
            'number' => $number,
            'issue_date' => $validated['issue_date'],
            'due_date' => $validated['due_date'] ?? null,
        ]);

        foreach ($validated['items'] as $item) {
            $amount = round($item['quantity'] * $item['unit_rate'], 2);
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_rate' => $item['unit_rate'],
                'amount' => $amount,
            ]);
        }

        $invoice->recalcTotals();

        return redirect()->route('invoices.show', $invoice)->with('success','Invoice created.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('matter.client','items');
        return view('invoices.show', compact('invoice'));
    }
}