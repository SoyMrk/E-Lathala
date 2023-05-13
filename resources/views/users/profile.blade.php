@extends('layouts.app')

@section('content')

<!-- component -->
<main class="bg-gray-900 h-screen">
    <div class="pt-20 flex justify-center">
        <div class="rounded bg-white w-120 inline-block p-3">
            <div class="flex justify-between py-1">
  	            <h3 class="text-lg">User Profile</h3>  
                    <svg 
                        class="h-7 cursor-pointer hover:bg-blue-200 transition-all duration-300" xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" @click="showModal2 = true">
                        <g id="user-edit"><path d="M10.56,11.87a3.75,3.75,0,1,1,3.75-3.75A3.76,3.76,0,0,1,10.56,11.87Zm0-6a2.25,2.25,0,1,0,2.25,2.25A2.25,2.25,0,0,0,10.56,5.87Z"/><path d="M3.56,18.87a.75.75,0,0,1-.75-.75c0-4.75,5.43-4.75,7.75-4.75.72,0,1.36,0,1.94.07a.75.75,0,0,1,.69.8.76.76,0,0,1-.81.69c-.54,0-1.14-.06-1.82-.06-5.18,0-6.25,1.3-6.25,3.25A.74.74,0,0,1,3.56,18.87Z"/><path d="M12.67,19.63a.75.75,0,0,1-.53-.22.72.72,0,0,1-.22-.59l.16-1.92a.75.75,0,0,1,.21-.47l5.52-5.52a2.06,2.06,0,0,1,2.8,0,2,2,0,0,1,.58,1.44,1.86,1.86,0,0,1-.53,1.33l-5.52,5.52a.74.74,0,0,1-.46.22l-1.94.18Zm1.94-.93h0Zm-1.06-1.41-.06.76.78-.07,5.33-5.33a.39.39,0,0,0,.09-.27.59.59,0,0,0-.14-.38.57.57,0,0,0-.68,0Z"/></g>
                    </svg>
            </div>
            <div class="flex flex-col gap-1 text-center items-center my-4">
                <img class="h-32 w-32 bg-white p-2 rounded-full shadow mb-4" src="{{ asset('images/profile.jpeg') }}" alt="">
                    <p class="font-semibold text-3xl">{{ auth()->user()->name }}</p>
            </div>

            <div class="p-2 text-teal text-xs">
                <span class="p-2 ml-4 mt-1 text-lg font-semibold">Username:</span>
                <span class="p-2 mt-1 text-lg">{{ auth()->user()->username }}</span>
            </div>
            <div class="p-2 text-teal text-lg">
                <span class="p-2 ml-4 mt-1 font-semibold">Your email</span>
                <span class="p-2 mt-1 ">{{ auth()->user()->email }}</span>
            </div>
        </div>
    </div>

    <body x-data="{showModal2: false}" :class="{'overflow-y-hidden':showModal2}">

            <!-- Modal2 -->
            <div class="fixed inset-40 z-20 duration-300 overflow-y-auto"
                x-show="showModal2"
                x-transition:enter="transition duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                
            <div class="relative sm:w-5/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                    @click.away="showModal2 = false"
                    x-show="showModal2"
                    x-transition:enter="transition transform duration-300"
                    x-transition:enter-start="scale-0"
                    x-transition:enter-end="scale-100"
                    x-transition:leave="transition transform duration-300"
                    x-transition:leave-start="scale-100"
                    x-transition:leave-end="scale-0">

            <form action="{{ route('user.profile.update',auth()->user()) }}" method="post" class="px-4 py-2">
                @csrf
                    <div class="mt-2">
                        <label class="mb-2 mt-2 text-sm font-bold text-gray-700" for="name">
                            Name
                        </label>
                            <input
                                class="w-full py-2 mb-2 text-sm text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Name"
                                value="{{ $user->name }}"
                            />
                
                   
                        <label class="mb-2 text-sm font-bold text-gray-700" for="username">
                            Username
                        </label>
                            <input
                                class="w-full py-2 mb-1 text-sm text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="username"
                                name="username"
                                type="text"
                                placeholder="Username"
                                value="{{ $user->username }}"
                            />
                  

                   
                        <label class="mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                            <input
                                class="w-full py-2 mb-2 text-sm text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Email"
                                value="{{ $user->email }}"
                            />
                    </div>

                <footer class="flex justify-center bg-transparent">
                    <button
                    class="my-2 bg-blue-600 font-semibold text-white py-3 w-full rounded hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                    @click="showModal2 = false">Save Changes</button>
                </footer>
            </form>
    </body>
</main>  

@endsection