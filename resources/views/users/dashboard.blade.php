@extends('layouts.app')


@section('content')
<div class="container mx-auto">
    <h1 class="text-lg hover:underline">Welcome User's Name{{-- User Name--}}</h1>

    <div>
        <button class="bg-color-red text-md">Report Fire</button>
        <button class="bg-color-green text-md">Report Accident</button>
        <button class="bg-color-blue text-md">Report Crime</button>
        <button class="bg-color-orange text-md">Report Flood</button>
    </div>

    <div>
        <a href="{{--Forum page--}}">Here's what you've missed</a>
    {{-- @foreach() --}}
            <div>
                <h3>{{-- {{User's Name}} --}}'s Post</h3>
                <p>{{-- {{Post Title}}--}}</p>
                <p class="text-sm text-color-gray 500">{{-- {{Date Posted}} --}}</p>
            </div>
    {{-- @endforeach --}}
    </div>

    <div>
        <h2>Need to contact authorities?</h2>
         <p>Hotlines: {{-- {{ if available }} --}}</p> 
    </div>

</div>
@endsection