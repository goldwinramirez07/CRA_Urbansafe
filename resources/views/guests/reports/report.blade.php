@extends('layouts.app')

@section('content')
<center>
<div class="w-full bg-white rounded-lg shadow dark:border md:mt-10 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="mt-10">
    <h1 class="font-bold">Make report</h1>
    </div>
    <div class="flex-6 p-6">
        <div class="space-x-3 mb-6">
            <button class="bg-red-600 text-white px-4 py-2 rounded mb-4"><a href="/report/fire">Report Fire</a></button>
            <button class="bg-green-600 text-white px-4 py-2 rounded mb-4"><a href="/report/accident">Report Accident</a></button>
            <button class="bg-blue-600 text-white px-4 py-2 rounded mb-4"><a href="/report/crime">Report Crime</a></button>
            <button class="bg-orange-600 text-white px-4 py-2 rounded mb-4"><a href="/report/flood">Report Flood</a></button>
        </div>
    </div>
</div>
</center>