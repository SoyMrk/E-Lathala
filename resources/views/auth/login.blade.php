@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
<div class="py-10">
  <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div class="hidden lg:block lg:w-full bg-cover" 
            style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
        </div>
        <div class="w-full p-6 lg:w-//16">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">E-Lathala</h2>
            <p class="text-xl text-gray-600 text-center">Welcome back!</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="border-b w-1/5 lg:w-1/4"></span>
                <a href="" class="text-xs text-center text-gray-500 uppercase">login with email</a>
                <span class="border-b w-1/5 lg:w-1/4"></span>
            </div>

            @if (session('status'))
                <div class="bg-red-500 p-2 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mt-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input type="email" name="email" id="email"
                    class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none @error('email') border-red-500 
                    @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password"
                    class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none @error('password') border-red-500 
                    @enderror" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="m-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2 
                            h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 ">
                        <label for="remember">Remember me</label>
                    </div>
                        <a href="#!" class="text-yellow-700 hover:text-yellow-900 focus:text-yellow-900 active:text-yellow-800 duration-200 
                            transition ease-in-out">Forgot password?</a>
                </div>
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded 
                    font-medium w-full">Login</button>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 md:w-1/4"></span>
                        <a href="{{ route('register') }}" class="text-xs text-gray-500 uppercase">or register an account</a>
                    <span class="border-b w-1/5 md:w-1/4"></span>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
@endsection