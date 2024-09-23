@extends('admin.common')
@section('title', 'customers | show')
@section('content')


    <div class="max-w-lg mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Customer Information</h2>

                <div x-data="{ open: false }">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-700">
                            {{ $customer->first_name }} {{ $customer->surname }}
                        </h3>
                        <button @click="open = !open" class="text-blue-600 hover:underline">
                            <span x-show="!open">Show Details</span>
                            <span x-show="open">Hide Details</span>
                        </button>
                    </div>

                    <!-- Hidden Details -->
                    <div x-show="open" x-transition class="mt-4 text-gray-600">
                        <p><strong>Email:</strong> {{ $customer->email }}</p>
                        <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
                        <p><strong>Ticket Number:</strong> {{ $customer->ticket_number }}</p>
                        <p><strong>Departure Point:</strong> {{ $customer->departure_point }}</p>
                        <p><strong>Destination:</strong> {{ $customer->destination }}</p>
                        <p><strong>ID:</strong> {{ $customer->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
