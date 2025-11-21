@extends('layouts.app')


@section('content')
    <center>
        <div class="mt-6 bg-white p-8 rounded shadow-md w-96 text-center">
            <h1 class="text-2xl font-bold mb-5">Email Verification</h1>
            <p class="text-lg">Please check your inbox and click the verification link we sent to your email.</p>
            <p class="text-sm mb-4">check spam if mail is not showing in inbox.</p>

            @if (session('message'))
                <p class="text-green-600">{{ session('message') }}</p>
            @endif

            <div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <p class="text-sm mt-4">Not in spam? try again after button is active</p>
                    <button id="resendbtn" type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Resend
                    </button>
                </form>
            </div>
        </div>
    </center>
@endsection

{{-- @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resendbtn = document.getElementById('resendbtn');
            if (resendbtn) {
                resendbtn.disabled = true;
                resendbtn.classList.add('opacity-50', 'cursor-not-allowed');

                setTimeout(function() {
                    resendbtn.disabled = false;
                    alert('Try Again after 3 mins.')
                    resendbtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }, 180000);

            }
        });
    </script>
@endpush --}}
