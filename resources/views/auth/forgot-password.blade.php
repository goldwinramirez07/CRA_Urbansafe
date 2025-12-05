@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 shadow rounded">
    <h2 class="text-lx font-bold mb-4">Forgot Password</h2>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}"> 
        @csrf
        <label class="">Email</label>
        <input type="text" name="email" class="w-full p-2 border rounded" required>

        @error('email')
            <p class="text-red-600 text-sm"> {{ $message }}</p>
        @enderror

        <button class="w-full mt-4 bg-blue-600 text-white p-2 rounded">
            Send Password Reset Link
        </button>
    </form>
</div>

@endsection