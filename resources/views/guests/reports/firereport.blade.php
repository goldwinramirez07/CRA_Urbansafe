@extends('layouts.app')

@section('content')
<center>
<div class="ml-6 mr-6 w-full bg-white rounded-lg shadow dark:border md:mt-10 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <strong>Fire Report</strong>

<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <label class="block mt-4">Date & Time</label>
        <input type="hidden" name="datetime" value="{{ now() }}">
        <input type="hidden" name="location" value="{{ $location ?? '' }}">

        <input type="text"name="datetime"value="{{ now() }}" class="w-full p-2 border rounded" disabled>

        <label class="block mt-4">Location</label>
        <input type="text" name="location" value="{{ $location ?? 'Location Unavailable' }}" class="w-full p-2 border rounded" disabled>

        <label class="block mt-4">Description <span class="text-sm">(optional)</span></label>
        <textarea name="description" rows="4" class="w-full p-2 border rounded" placeholder="Descriptionl..."></textarea>

        <label class="block mt-4">Upload Photo/Video</label>
        <input type="file" name="media" accept="image/*" capture="camera" class="w-full p-2 border rounded">

        <button type="submit" class="w-full mt-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Submit Report
        </button>
</form>
</div>
</center>
@endsection


