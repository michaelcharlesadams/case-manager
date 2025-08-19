<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl">Clients</h2>
    </x-slot>
  
    <div class="py-6 px-6 max-w-7xl mx-auto ">
      <a href="{{ route('clients.create') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">New Client</a>
  
      <div class="mt-4 bg-white shadow sm:rounded-lg">
        <table class="min-w-full divide-y">
          <thead>
            <tr>
              <th class="px-4 py-2 text-left">Name</th>
              <th class="px-4 py-2 text-left">Email</th>
              <th class="px-4 py-2 text-left">Phone</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="divide-y">
            @forelse($clients as $client)
              <tr>
                <td class="px-4 py-2">{{ $client->name }}</td>
                <td class="px-4 py-2">{{ $client->email }}</td>
                <td class="px-4 py-2">{{ $client->phone }}</td>
                <td class="px-4 py-2 text-right">
                  <a class="text-indigo-600" href="{{ route('clients.show', $client) }}">View</a>
                </td>
              </tr>
            @empty
              <tr>
                <td class="px-4 py-8 text-center text-gray-500" colspan="4">
                  No clients yet. <a class="text-indigo-600" href="{{ route('clients.create') }}">Create one</a>.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
  
        <div class="p-4">
          {{ $clients->links() }}
        </div>
      </div>
    </div>
  </x-app-layout>
  