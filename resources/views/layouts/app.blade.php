<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Lathala</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    <body class="bg-yellow-200">
        <nav class="p-2 bg-yellow-200 flex justify-between mb-3 sticky top-0 z-50">
            <div class="container mx-auto flex flex-wrap p-2 flex-col md:flex-row items-center">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo1.png') }}" width="200" alt="siteName"></a>

            </div>
            <ul class="hidden mx-8 lg:flex lg:items-center lg:w-auto lg:space-x-8">
                <li>
                    <a href="{{ route('home') }}" class="nav-link block rounded-md font-medium text-sm leading-tight uppercase border-x-0 border-t-0 
                    border-b-2 border-transparent px-3 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active">Home</a>
                </li>
              
                @auth
                <li>
                    <a href="{{ route('posts') }}" class="nav-link block rounded-md font-medium text-sm leading-tight uppercase border-x-0 border-t-0 
                    border-b-2 border-transparent px-3 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active">Post</a>
                </li>
                @endauth

                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"                        
                        class="flex nav-link block rounded-md font-medium text-sm leading-tight uppercase 
                    border-transparent px-3 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active">
                    <span>Marketplace</span>
                    <svg fill="currentColor" viewBox="" 
                        :class="{'rotate-180': open, 'rotate-0': !open}" 
                        class="w-4 h-4 transition-transform duration-200 transform md:-mt-0">
                        <path 
                            fill-rule="evenodd" 
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                            clip-rule="evenodd">
                        </path>
                    </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100" 
                        x-transition:enter-start="transform opacity-0 scale-95" 
                        x-transition:enter-end="transform opacity-100 scale-100" 
                        x-transition:leave="transition ease-in duration-75" 
                        x-transition:leave-start="transform opacity-100 scale-100" 
                        x-transition:leave-end="transform opacity-0 scale-95" 
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg ">

                        <div class="px-2 py-2 bg-white rounded-md shadow bg-gray-100">
                            <a class="block rounded-md px-4 py-2 mt-2 text-sm font-semibold bg-transparent hover:bg-gray-200 md:mt-0" 
                            href="{{ route('posts.books') }}">BOOKS</a>
                        
                            <a class="block rounded-md px-4 py-2 mt-2 text-sm font-semibold bg-transparent hover:bg-gray-200 md:mt-0" 
                            href="{{ route('posts.materials') }}">MATERIALS</a>
                        </div>
                    </div>
                </div>
                
            </ul>

            <!-- search bar -->
            <div class="container mx-10 flex flex-wrap p-2 flex-col md:flex-row items-center xl:w-80">
                <input class="block px-3 py-1.5 text-sm text-yellow-900 hover:text-yellow-900 font-semibold
                            border hover:border-yellow-700 rounded" placeholder="Search">
                    <button class="inline-block px-3 py-1.5 text-sm font-semibold leading-none bg-yellow-700 hover:bg-yellow-900 text-white rounded">
                    <svg class="text-white-50 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    </button>
            </div>

            <ul class="hidden lg:flex lg:items-center lg:w-auto lg:space-x-4 lg:mx-8">
                @auth  
                    <li>
                        <a class="nav-link block rounded-md font-medium text-lg font-bold leading-tight uppercase border-x-0 border-t-0 
                        border-b-2 border-transparent px-3 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active" 
                        href="{{ route('users.profile',auth()->user()) }}" disabled>{{ auth()->user()->username }}</a>
                    </li>
                
                    <li>
                        <a class="navbar-brand" href="{{ route('users.profile',auth()->user()) }}"><img src="/images/userlogo.png" class="logo"></a>
                    </li>     
                    <li>
                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open"                        
                                class="flex nav-link block rounded-md font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-3 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active">
                                <svg class="fill-current h-5 w-5" viewBox="0 0 20 20">
                                    <path d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
                                    c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
                                    s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
                                    c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"></path>
                                </svg>
                            </button>

                            <div x-show="open" x-transition:enter="transition ease-out duration-100             " 
                                x-transition:enter-start="transform opacity-0 scale-95" 
                                x-transition:enter-end="transform opacity-100 scale-100" 
                                x-transition:leave="transition ease-in duration-75" 
                                x-transition:leave-start="transform opacity-100 scale-100" 
                                x-transition:leave-end="transform opacity-0 scale-95" 
                                class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">

                                <div class="px-2 py-2 bg-white rounded-md shadow bg-gray-100">
                                    <div>
                                        <a class="block rounded-md px-4 py-2 mt-2 text-xs font-semibold bg-transparent hover:bg-gray-200 md:mt-0" 
                                        href="{{ route('transactions.user', auth()->user()->name ) }}">Transaction</a>
                                    </div>
                                    
                                    <div>
                                        <a class="block rounded-md px-4 py-2 mt-2 text-xs font-semibold bg-transparent hover:bg-gray-200 md:mt-0" 
                                        href="{{ route('transactions.sold',auth()->user()->name) }}">History - Items Sold</a>
                                    </div>
                                    <div>
                                        <a class="block rounded-md px-4 py-2 mt-2 text-xs font-semibold bg-transparent hover:bg-gray-200 md:mt-0" 
                                        href="{{ route('transactions.bought',auth()->user()->name) }}">History - Items Bought</a>
                                    </div>
                                        
                                    <form action="{{ route('logout') }}" class="block rounded-md px-4 py-2 mt-2 text-xs font-semibold bg-transparent hover:bg-yellow-700 md:mt-0" method="post">
                                        @csrf
                                        <button type="submit" class="w-full text-xs font-semibold text-left">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="inline-block px-4 py-3 text-sm text-yellow-700 hover:text-yellow-900 font-semibold leading-none border border-yellow-700 hover:border-yellow-900 rounded">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="inline-block px-4 py-3 text-sm font-semibold leading-none bg-yellow-700 hover:bg-yellow-900 text-white rounded">Register</a>
                    </li>   
                @endguest                
            </ul>
        </nav>
        
        @yield('content')
    </body>
    
    <footer class="text-black-900 bg-yellow-200 body-font">
        <div class="w-full px-2 py-2 flex items-justify sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <div class="w-full mx-auto flex flex-wrap p-2 flex-col md:flex-row items-center">
                    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo1.png') }}" width="200" alt="siteName"></a>
                        <p class="text-sm text-gray-900 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 pl-20 sm:mt-0 mt-4">2022 E-Team - Bicol University College of Science</p>
                        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                            <a href="#" class="text-gray-500 hover:text-gray-600">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a href="#" class="ml-3 text-gray-500 hover:text-gray-600">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-115a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                                </svg>
                            </a>
                            <a href="#" class="ml-3 text-gray-500 hover:text-gray-600">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"class="w-5 h-5">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                </svg>
                            </a>
                            <a href="#" class="ml-3 text-gray-500 hover:text-gray-600">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" viewBox="0 0 24 24"class="w-5 h-5">
                                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                                </svg>
                            </a>
                        </span>
                    </a>
                </div>
            </a>
        </div>
    </footer>
</html>