@extends('layouts.app')


@section('content')
<div class="container mx-auto">
    <h1 class="text-lg">Community Forum Feed</h1>

    {{-- @foreach ('') Loop the acquired posts--}}

    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-xl font-semibold mb-2">
            {{-- <a href="route for obtaining post by ID"> class="text-blue-600 hover:underline--}}
                {{-- {{"Post tile"}} --}}
        </h2>

        <p class="text-gray-700 mb-3">
            {{-- {{"post details"}} --}}
        </p>

        <div class="text-sm text-gray-500 flex justify-between items-center">
            {{-- <span>{{"User who posted and time and date"}}</span> --}}
            {{-- <a href={{"Post details route"}} class="text-blue-500 hover:text-blue-700"></a> --}}
        </div>
    </div>
    {{-- @endforeach --}}

    <div class="mt-4">
        {{-- {{"paginate?"}} --}}
    </div>

</div>
@endsection