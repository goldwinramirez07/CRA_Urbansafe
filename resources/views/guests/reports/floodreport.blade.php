@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full bg-white rounded-lg shadow md:mt-10 sm:max-w-md p-6">

        <h2 class="text-lg font-bold mb-3 text-center">Flood Report</h2>

        @include('components.report-form', [
            'action' => route('guest.flood.submit'),
            'label' => 'Flood',
            'location' => $location ?? null
        ])

    </div>
</div>
@endsection


