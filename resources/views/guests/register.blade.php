@extends('layouts.app')

@section('content')
<center>
<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  <a href="/login">UrbanSafe</a>
              </h1>
    <form action="{{route('register.submit')}}" method="POST" class="space-y-4 md:space-y-6" >
        @csrf
        <input type="hidden" name="role" value={{$role = 'user'}}>
        <div>
            <labe class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Name" required="">
        </div>
        <div class="span">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" value= "{{ old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="youremail@domain.com" required="">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }} Please<a href="/login" class="text-sm hover:underline text-blue-600"> Sign in </a>instead </p>
            @enderror
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required="">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required="">
        </div>
        <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create Account</button>
    </form>
    </div>
</div>
</center>