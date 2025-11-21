@extends('layouts.app')


@section('content')
<div class="container mx-auto">
    <h2 class="text-xl font-semibold mb-2">
        <a href="{{"route for post details via post id"}}" class="text-blue-600 hover:underline">
            {{ /* title */ }}
        </a>
    </h2>

    <p class="text-gray-700 mb-3">
        content of the post
    </p>

    <div class="text-sm text-gray-500 flex justify-between items-center">

        <span>

        </span>
        
        @auth
        {{-- Auth logic --}} 
        <form action="" method="POST">

            <button class="text-red-500 hover:text-red-700 font-semibold">
                Delete
            </button>

        </form>
        @endauth
    </div>
</div>

@endsection