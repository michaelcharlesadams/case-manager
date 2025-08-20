<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Client Information</h2>
    </x-slot>

    <div class="py-6 px-6 max-w-7xl mx-auto ">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <div>
                <h2 class="text-xl font-bold pb-1">Client: {{ $client->name }}</h2>
                <p class="pb-1">Email: {{ $client->email }}</p>
                <p class="pb-2">Phone: {{$client->phone}}</p>
                <hr class="pb-2">
                <a href="{{ route('clients.index') }}" class="text-indigo-600 btn btn-primary">View all Clients</a>
                <hr class="pb-2">
                <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 btn btn-primary">Edit this Client</a>
            </div>
        </div>
    </div>
</x-app-layout>