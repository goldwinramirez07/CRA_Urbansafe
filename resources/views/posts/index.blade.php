@extends('layouts.app')


@section('content')
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <div class="flex-1 flex flex-col space-y-6">
            <strong class="text-xl">Community Forum Feed</strong>

            <div class="bg-white shadow-md rounded-lg p-6 mb-6 mt-4">
                <h2 class="text-lg font-semibold mb-4">Create post</h2>

                <form action="{{ route('posts.store') }} " method="POST">
                    @csrf
                    <input type="text" name="title" class="bg-white text-md shadow-md rounded-lg p-3 mb-3 mt-4"
                        placeholder="Title" />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <textarea name="content" rows="4" class="w-full p-3 border rounded-lg focus:ring-blue-500 border-blue-500"
                        placeholder="Got something in mind? Express it here!"></textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <div class="flex justify-end mt-3">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Post</button>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                @foreach ($posts as $post)
                    <h2 class="text-xl font-semibold">
                        {{ $post->title }}
                    </h2>
                    <a href="{{ route('posts.details', $post->id) }}" class="text-xxs text-gray-600 hover:underline"
                        name="created_at">
                        {{ $post->created_at }}</a>
                    <p class="text-gray-700 mb-3">
                        {{ $post->body }}
                    </p>
                    <div class="text-md text-gray-500 flex justify-between items-center">
                        {{-- <span>{{ $post->user_id }}</span> --}}
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>

        </div>

    </div>
@endsection
