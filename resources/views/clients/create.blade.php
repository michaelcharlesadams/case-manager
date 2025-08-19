<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">New Client</h2></x-slot>
    <div class="py-6 px-6 max-w-7xl mx-auto ">
      <div class="bg-white p-6 shadow sm:rounded-lg">
        <form method="POST" action="{{ route('clients.store') }}">
          @csrf
          <div class="mb-4">
            <label class="block font-medium">Name</label>
            <input name="name" class="mt-1 border rounded w-full" required>
          </div>
          <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input name="email" type="email" class="mt-1 border rounded w-full">
          </div>
          <div class="mb-4">
            <label class="block font-medium">Phone</label>
            <input name="phone" class="mt-1 border rounded w-full">
          </div>
          <div class="mb-4">
            <label class="block font-medium">Address</label>
            <input name="address" class="mt-1 border rounded w-full">
          </div>
          <button class="px-4 py-2 bg-indigo-600 text-white rounded">Save</button>
        </form>
      </div>
    </div>
  </x-app-layout>
  