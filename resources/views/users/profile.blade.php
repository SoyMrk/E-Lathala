@extends('layouts.app')

@section('content')


<!-- <div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-lg">
    
    @foreach($user->getAttributes() as $key => $value)
        <div class="mb-3 rounded-lg">
            {{$key}} -> {{ $value }}
        </div>
    @endforeach
    
</div>
</div> -->

<!-- component -->
<main class="bg-white shadow rounded-lg p-10 px-20 py-10 ml-20 mr-20">
    <header>
            <div class="container mx-auto px-10 py-10">
                <div class="flex items-center justify-center">
                    <div class="w-full text-gray-400 md:text-center text-xl font-semibold">
                    User Profile
                    </div>
                </div>
            </div>
    </header>
            <div class="flex flex-col gap-1 text-center items-center">
                <img class="h-32 w-32 bg-white p-2 rounded-full shadow mb-4" src="https://www.svgrepo.com/show/105032/avatar.svg" alt="">
                <p class="font-semibold text-3xl">{{ auth()->user()->name }}</p>
            </div>
            
            <div class="-m-2 text-center">
                <div class="p-2">
                    <div class="inline-flex items-center bg-white leading-none text-pink-600 p-2 text-teal text-sm">
                        <span class="inline-flex bg-pink-600 text-white rounded-full h-4 px-3 justify-center items-center mt-2">Username</span>
                        <span class="inline-flex px-2">{{ auth()->user()->username }}</span>
                    </div>
                </div>
                <div class="p-2">
                    <div class="inline-flex items-center bg-white leading-none text-purple-600 p-2 text-sm">
                        <span class="inline-flex bg-purple-600 text-white rounded-full h-4 px-3 justify-center items-center text-">Email Address</span>
                        <span class="inline-flex px-2">{{ auth()->user()->email }}</span>
                    </div>
                </div>

                <div class="p-2">
                    <button
                        class="bg-green-600 font-semibold text-white p-2 w-15 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                        @click="showModal2 = true">Edit
                    </button>
                </div>
            </div>


            <body x-data="{showModal2: false}" :class="{'overflow-y-hidden':showModal2}">

            <!-- Modal2 -->
            <div class="fixed inset-20 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                x-show="showModal2"
                x-transition:enter="transition duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                
            <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                    @click.away="showModal2 = false"
                    x-show="showModal2"
                    x-transition:enter="transition transform duration-300"
                    x-transition:enter-start="scale-0"
                    x-transition:enter-end="scale-100"
                    x-transition:leave="transition transform duration-300"
                    x-transition:leave-start="scale-100"
                    x-transition:leave-end="scale-0">

            <form action="{{ route('user.profile.update',auth()->user()) }}" method="post" class="px-4">
                @csrf
                <div class="mt-2">
                    <label class="mb-2 text-sm font-bold text-gray-700" for="name">
                        Name
                    </label>
                        <input
                            class="w-full py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="name"
                            name="name"
                            type="text"
                            placeholder="Name"
                            value="{{ $user->name }}"
                        />
                </div>
                <div class="mb-2">
                    <label class="mb-2 text-sm font-bold text-gray-700" for="username">
                        Username
                    </label>
                        <input
                            class="w-full py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="username"
                            name="username"
                            type="text"
                            placeholder="Username"
                            value="{{ $user->username }}"
                        />
                </div>

                <div class="mb-2">
                    <label class="mb-2 text-sm font-bold text-gray-700" for="email">
                        Email
                    </label>
                        <input
                            class="w-full py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Email"
                            value="{{ $user->email }}"
                        />
                </div>
            

            <footer class="flex justify-center bg-transparent">
                <button
                class="bg-green-600 font-semibold text-white py-3 w-full rounded-b-md hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                @click="showModal2 = false"
                >
                Save Changes
                </button>
            </footer>
            </form>
</main>
@endsection