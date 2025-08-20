<x-app-layout>
    <x-slot name="header">
        <h2>Edit Matter</h2>
    </x-slot>

    <div class="py-6 px-6 max-w-7xl mx-auto ">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <form method="POST" action="{{ route('matters.update', $matter) }}">
                @csrf
                @method('PUT')  {{-- IMPORTANT: tells Laravel to use update(), not store() --}}
            
                <div class="mb-4">
                    <label class="block font-medium">Title</label>
                    <input name="title" value="{{ old('title', $matter->title) }}" class="border rounded w-full" required>
                    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            
                <div class="mb-4">
                    <label class="block font-medium">Client</label>
                    <select name="client_id" class="border rounded w-full" required>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" @selected(old('client_id', $matter->client_id) == $client->id)>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('client_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            
                <div class="mb-4">
                    <label class="block font-medium">Status</label>
                    <select name="status" class="border rounded w-full" required>
                        @php $statuses = ['open' => 'Open', 'on_hold' => 'On hold', 'closed' => 'Closed']; @endphp
                        @foreach($statuses as $value => $label)
                            <option value="{{ $value }}" @selected(old('status', $matter->status) === $value)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('status') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            
                <div class="mb-4">
                    <label class="block font-medium">Description</label>
                    <textarea name="description" class="border rounded w-full" rows="4">{{ old('description', $matter->description) }}</textarea>
                    @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            
                <button class="px-4 py-2 bg-indigo-600 text-white rounded">Save changes</button>
            
                {{-- Show a general error list if anything fails --}}
                @if ($errors->any())
                    <div class="mt-4 p-3 bg-red-50 text-red-700 rounded">
                        <strong>Fix the following:</strong>
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            
        </div>
    </div>

</x-app-layout>