<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Matter: {{ $matter->number }}</h2></x-slot>
    <div class="py-6 px-6 max-w-7xl mx-auto ">
        <div class="bg-white p-6 shadow sm:rounded-lg">
            <div>
                <h2 class="text-xl font-bold pb-1">Matter: {{ $matter->title }}</h2>
                <p class="pb-1">Description: {{ $matter->description }}</p>
                <p class="pb-2">Client: {{$matter->client->name}}</p>
                <hr class="pb-2">
                <a href="{{ route('matters.index') }}" class="text-indigo-600 btn btn-primary">View all matters</a>
                <hr class="pb-2">
                <a href="{{ route('matters.edit', $matter->id) }}" class="text-indigo-600 btn btn-primary">Edit this matter</a>
            </div>
        </div>
    </div>
</x-app-layout>