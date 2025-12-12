@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen">
        @include('components.sidebar')

        <div class="flex-1 p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mb-6 relative">

                @auth
                    @if ($post->user_id === auth()->id())
                        <div x-data="{ open: false }" class="absolute top-4 right-4">
                            <button @click="open = !open">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-gray-600 hover:text-gray-800 cursor-pointer" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6h.01M12 12h.01M12 18h.01" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md z-50">

                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">Edit</a>

                                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endauth

                <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>

                <p class="text-sm text-gray-500 mb-4">
                    Posted By: <strong>{{ $post->user->name }}</strong>
                </p>

                <p class="text-gray-800 mb-4 leading-relaxed">{{ $post->body }}</p>

                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-3">Comments</h2>

                    @if ($post->comments->isEmpty())
                        <p class="text-gray-600">No comment yet.</p>
                    @else
                        @foreach ($comments as $comment)
                            <div class="bg-gray-100 p-4 rounded-lg mb-4 relative">

                                @auth
                                    @if (auth()->id() === $comment->user_id)
                                        <div x-data="{ open: false, modal: false }" class="absolute top-2 right-2">

                                            <button @click="open = !open">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6h.01M12 12h.01M12 18h.01" />
                                                </svg>
                                            </button>

                                            
                                            <div x-show="open" @click.away="open = false"
                                                class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md z-50">

                                                <button @click="modal = true; open = false"
                                                    class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                                    Edit
                                                </button>

                                                <form action="{{ route('comments.delete', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                            <div x-show="modal" @click.self="modal = false" x-transition
                                                class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
                                                <div x-transition class="bg-white p-6 rounded-lg shadow-lg w-96">

                                                    <h2 class="text-xl font-semibold mb-4">Edit Comment</h2>

                                                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                                        @csrf
                                                        @method('POST')

                                                        <textarea name="comment" rows="4" class="w-full p-3 border rounded-lg mb-4">{{ $comment->body }}</textarea>

                                                        <div class="flex justify-end space-x-2">
                                                            <button type="button" @click="modal = false"
                                                                class="px-4 py-2 rounded-lg border">
                                                                Cancel
                                                            </button>

                                                            <button type="submit"
                                                                class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                @endauth

                                <p class="text-sm text-gray-500 mb-2">
                                    <strong>{{ $comment->user->name }}</strong>
                                </p>

                                <p class="text-gray-800">
                                    {{ $comment->comment }}
                                </p>

                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="bg-white shadow rounded-lg mt-4 p-6 mb-4 relative">
                    <form action="{{ route('comments.add', $post->id) }}" method="POST">
                        @csrf

                        <textarea name="comment" rows="4" class="w-full p-3 border rounded-lg focus:ring-blue-500 border-blue-500 mb-4"
                            placeholder="Got something in mind? Express it here!"></textarea>

                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 bottom-1 right-6 absolute">
                            Add Comment
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
