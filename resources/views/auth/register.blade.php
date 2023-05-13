@extends('layouts.app')

@section('content')
<section>
<div class="py-20 bg-gray-900 h-screen ">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div class="hidden lg:block lg:w-full bg-cover" 
            style="background-image:url('https://th.bing.com/th/id/R.edd8346835dd1f3d7dade0708a290332?rik=SJaPtLbVFgXzqw&riu=http%3a%2f%2fcultura.castillalamancha.es%2fsites%2fcultura.castillalamancha.es%2ffiles%2fstyles%2fblog_800x600%2fpublic%2f2019-02%2fp1d3b5i9d5hpb1c2j1na914t61mrg4.jpg%3fitok%3dRKj6SPxb&ehk=zi62ZAJ%2fv6JqQBC%2fI27AuBnD36m3HXXDNa8YavRYC3M%3d&risl=&pid=ImgRaw&r=0')">
        </div>
        <div class="w-full p-4 lg:w-//16">
            <h2 class="text-2xl font-semibold text-gray-700 text-center"><b>Welcome to E-Lathala</b></h2>
            <div class="mt-4 flex items-center justify-between">
                <span class="border-b w-1/5 lg:w-1/4"></span>
                <a href="#" class="text-xs text-center text-gray-500 uppercase">Create New Account</a>
                <span class="border-b w-1/5 lg:w-1/4"></span>
            </div>
            <div class="w-full p-2 lg:w-//16">
                <div class="lg:max-w-md p-4 bg-gray-100 rounded-lg">
                    <form action="{{ route('register') }}" method="post">    
                        @csrf
                        <div class="mt-2">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-1"></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" 
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 
                            block w-full appearance-none @error('name') border-red-500 @enderror" 
                            value="{{ old('name') }}">
                    
                            @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" 
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 
                            block w-full appearance-none @error('username') border-red-500 
                            @enderror" value="{{ old('username') }}">

                            @error('username')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="email" class="sr-only">Name</label>
                            <input type="email" name="email" id="email" placeholder="Your Email" 
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 
                            block w-full appearance-none @error('email') border-red-500 
                            @enderror" value="{{ old('email') }}">

                            @error('email')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="sr-only">Name</label>
                            <input type="password" name="password" id="password" placeholder="Password" 
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 
                            block w-full appearance-none @error('password') border-red-500 
                            @enderror" value="">

                            @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="sr-only">Name</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password" 
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 
                            block w-full appearance-none @error('password_confirmation') border-red-500 
                            @enderror" value="">
                    
                            @error('password_confirmation')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> 
                            <label class="inline-block mt-4">
                            <input class="mr-1" type="checkbox" name="terms" value="1">
                            <span class="text-sm text-gray-500">By signing up, you agree to our <a class="font-bold hover:underline" href="#">Terms, Data Policy</a> and <a class="font-bold hover:underline" href="#">Cookies Policy</a>.</span>
                            </label>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 md:w-1/4"></span>
                                <a href="{{ route('login') }}" class="text-xs text-gray-500 uppercase">Already have an account?</a>
                            <span class="border-b w-1/5 md:w-1/4"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection