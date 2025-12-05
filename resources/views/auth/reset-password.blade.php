@extends('layouts.app')

@section('content')
<div class="max-w-wd max-auto mt-10 bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Reset Password</h2>

    <form action="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label class="">Email</label>
        <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email') }}" required>
        @error('email')
            <p class="text-red-600 text-sm"> {{ $message }}</p>
        @enderror

        <label class="mt-4">New Password</label>
        <input type="passsword" name="password" class="w-full p-2 border rounded" required>

        @error('password')
            <p class="text-red-600 text-sm"> {{ $message }}</p> 
        @enderror

        <label class="mt-4">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>

        <button class="w-full mt-4 bg-blue-600 text-white p-2 rounded">
            Reset Password
        </button>
    </form>
</div>
@endsection