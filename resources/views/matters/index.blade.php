<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Matters</h2>
    </x-slot>

    <div class="py-6 px-6 max-w-7xl mx-auto ">
        <a href="{{ route('matters.create') }}" class="btn btn-primary">New Matter</a>
        <div class="mt-4 bg-white shadow sm:rounded-lg">
            <table class="min-w-full divide-y">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Number</th>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Client</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($matters as $matter)
                        <tr>
                            <td class="px-4 py-2">{{ $matter->number }}</td>
                            <td class="px-4 py-2">{{ $matter->title }}</td>
                            <td class="px-4 py-2">{{ $matter->client->name }}</td>
                            <td class="px-4 py-2">{{ ucfirst($matter->status) }}</td>
                            <td class="px-4 py-2 text-right">
                                <a class="text-indigo-600" href="{{ route('matters.show', $matter) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">{{ $matters->links() }}</div>
        </div>
    </div>
</x-app-layout>