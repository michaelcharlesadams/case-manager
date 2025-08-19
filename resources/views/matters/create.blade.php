<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">New Matter</h2></x-slot>
    <div class="py-6 px-6 max-w-7xl mx-auto ">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <form method="POST" action="{{ route('matters.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium">Client</label>
                    <select name="client_id" class="mt-1 border rounded w-full">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                    @error('client_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Title</label>
                    <input name="title" class="mt-1 border rounded w-full" required />
                    @error('title')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Description</label>
                    <textarea name="description" class="mt-1 border rounded w-full"></textarea>
                </div>

                <button class="px-4 py-2 bg-indigo-600 text-white rounded">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>