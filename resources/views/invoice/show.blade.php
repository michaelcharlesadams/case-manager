<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Invoice {{ $invoice->number }}</h2></x-slot>

    <div class="py-6 px-6">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <div class="flex justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold">{{ $invoice->matter->client->name }}</h3>
                    <p>Matter: {{ $invoice->matter->number }} — {{ $invoice->matter->title }}</p>
                </div>
                <div>
                    <p><strong>Issued:</strong> {{ $invoice->issue_date }}</p>
                    <p><strong>Due:</strong> {{ $invoice->due_date ?? '—' }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
                </div>
            </div>

            <table class="min-w-full divide-y">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-right">Qty</th>
                        <th class="px-4 py-2 text-right">Rate</th>
                        <th class="px-4 py-2 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($invoice->items as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item->description }}</td>
                            <td class="px-4 py-2 text-right">{{ number_format($item->quantity, 2) }}</td>
                            <td class="px-4 py-2 text-right">${{ number_format($item->unit_rate, 2) }}</td>
                            <td class="px-4 py-2 text-right">${{ number_format($item->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 text-right space-y-1">
                <div>Subtotal: ${{ number_format($invoice->subtotal, 2) }}</div>
                <div>Tax: ${{ number_format($invoice->tax, 2) }}</div>
                <div class="font-semibold">Total: ${{ number_format($invoice->total, 2) }}</div>
            </div>
        </div>
    </div>
</x-app-layout>