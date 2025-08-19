<?php

namespace Database\Seeders;

use App\Models\{Client, Matter, Task, TimeEntry, Invoice, InvoiceItem};
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $client = Client::create([
            'name' => 'Acme Manufacturing', 'email' => 'legal@acme.test', 'phone' => '555-0000'
        ]);

        $matter = Matter::create([
            'client_id' => $client->id,
            'number' => 'MAT-'.now()->format('Y').'-0001',
            'title' => 'Contract Dispute',
            'status' => 'open'
        ]);

        Task::create(['matter_id' => $matter->id, 'title' => 'Draft complaint']);
        TimeEntry::create(['matter_id' => $matter->id, 'user_id' => 1, 'duration_minutes' => 120, 'rate' => 300, 'description' => 'Research']);

        $inv = Invoice::create([
            'matter_id' => $matter->id,
            'number' => 'INV-'.now()->format('Y').'-0001',
            'issue_date' => now()->toDateString(),
        ]);

        InvoiceItem::create(['invoice_id' => $inv->id, 'description' => 'Legal services', 'quantity' => 2, 'unit_rate' => 300, 'amount' => 600]);
        $inv->recalcTotals();
    }
}
