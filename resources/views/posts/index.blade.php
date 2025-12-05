@extends('layouts.app')


@section('content')
<div class="container mx-auto">
    <h1 class="text-lg">Community Forum Feed</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6 mt-4">
        <h2 class="text-lg font-semibold mb-4">Create post</h2>

    <form action="{{ route('posts.store') }} " method="POST">
        @csrf
        <input type="text" name="title" class="bg-white text-md shadow-md rounded-lg p-3 mb-3 mt-4" placeholder="Title" />
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        
        <textarea name="content"
            rows="4" 
            class="w-full p-3 border rounded-lg focus:ring-blue-500 border-blue-500" 
            placeholder="Got something in mind? Express it here!">
        </textarea>
        @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <div class="flex justify-end mt-3">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Post</button>
        </div>
    </form>
    </div>

    @foreach ($posts as $post) 
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-xl font-semibold mb-2">
            <a href="route for obtaining post by ID"> class="text-blue-600 hover:underline">
                {{ $post->title }} 
        </h2>
        <p class="text-gray-700 mb-3">
            {{ $post->body}}
        </p>
        <div class="text-sm text-gray-500 flex justify-between items-center">
            <span>{{ $post->user_id }}</span>
            <a href={{ route('posts.details')}} class="text-blue-500 hover:text-blue-700"></a>
        </div>
    </div>
    @endforeach

    <div class="mt-4">
        {{ $posts->links() }}
    </div>

</div>
@endsection