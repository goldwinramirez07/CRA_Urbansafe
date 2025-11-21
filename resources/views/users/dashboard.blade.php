@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <div class="flex-1 p-6">
        <h1 class="text-lg hover:underline mb-4">
            Welcome <strong>{{ auth()->user()->name }}</strong>
        </h1>

        {{-- Quick Report Buttons --}}
        <div class="space-x-2 mb-6">
            <button class="bg-red-600 text-white px-4 py-2 rounded">Report Fire</button>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Report Accident</button>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Report Crime</button>
            <button class="bg-orange-600 text-white px-4 py-2 rounded">Report Flood</button>
        </div>

        {{-- Posts Preview --}}
        <div class="mb-6">
            <a href="{{ route('posts.view') }}" class="underline text-blue-600">Here's what you've missed</a>

            @foreach ($posts as $post)
                <div class="mt-3 p-4 bg-white shadow rounded">
                    <h3 class="font-semibold">{{ $post->title }}</h3>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <p class="text-sm text-gray-500">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            @endforeach

            @if ($posts->isEmpty())
                <p class="text-gray-500 mt-3">You're up to date!</p>
            @endif
        </div>

        {{-- Hotline Section --}}
        <div>
            <h2 class="font-semibold text-lg mb-1">Need to contact authorities?</h2>
            <p>Hotlines: {{-- showing soon --}}</p>
        </div>

    </div>

</div>
@endsection
