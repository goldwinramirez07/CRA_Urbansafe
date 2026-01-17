@extends('layouts.app')

@section('content')
    @auth
        <div class="flex min-h-screen">
            @include('components.sidebar')

            <div class="flex-1 p-6 space-y-6">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h2 class="text-2xl font-semibold mb-2">{{ $user->name }}'s Profile</h2>
                    <p class="text-gray-600 mb-4">Email: {{ $user->email }}</p>
                    <p class="text-gray-600">Joined on: {{ $user->created_at->format('F j, Y') }}</p>
                </div>
            </div>

            <div class="flex-1 p-6 space-y-6">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    
                </div>
            </div>
        </div>
    @endauth
@endsection
