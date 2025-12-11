@extends('layouts.app')


@section('content')
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <div class="flex-1 p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mb-6 relative">
                @auth
                    @if ($post->user_id === auth()->id())
                        <div x-data="{ open: false}" class="absolute top-4 right-4">
                            <button  @click="open = !open">
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
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    Edit
                                </a>

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
                <h2 class="text-2xl font-semibold mb-2">
                    {{ $post->title }}
                </h2>
                <p class="text-sm text-gray-500 mb-4">
                    Posted By: <Strong>{{ $post->user->name }}</Strong>
                </p>

                <p class="text-gray-800 mb-4 leading-relaxed">
                    {{ $post->body }}
                </p>

                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-3">Comments</h2>
                    @if(empty($post->comments))
                        <p class="text-gray-600">No comment yet.</p>
                    @endif
                    @foreach ($post->comments as $comment)
                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <p class="text-sm text-gray-500 mb-2">
                                Commented By: <strong>{{ $comment->user->name }}</strong>
                            </p>
                            <p class="text-gray-800">
                                {{ $comment->body }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
