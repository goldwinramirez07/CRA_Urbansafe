@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full bg-white rounded-lg shadow md:mt-10 sm:max-w-md p-6">

        <h2 class="text-lg font-bold mb-3 text-center">Crime Report</h2>

        @include('components.report-form', [
            'action' => route('guest.crime.submit'),
            'label' => 'Crime',
        ])

    </div>
</div>
@endsection


