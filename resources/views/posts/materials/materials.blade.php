@extends('layouts.app')

@section('content')

<div class="bg-gray-900">
    <header>
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="w-full text-yellow-600 font-sans text-3xl font-bold tracking-wider">
                    <br>
                    E-LATHALA MARKETPLACE
                </div>
            </div>
        </div>
    </header>

    <main class="">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-400 text-2xl font-medium">E-Lathala Materials</h3>
            <span class="mt-3 text-sm text-gray-500">{{ $posts->count() }} {{ Str::plural('Product', $posts->count()) }}</span>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach($posts as $post)
                <div class="w-full bg-white max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://i.pinimg.com/originals/52/59/40/5259408fc762956f635db147f759ad50.jpg')">
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-black-700 uppercase font-semibold">{{ $post->title }}</h3> 
                        <span class="text-gray-500 mt-2 text-yellow-500">{{ $post->price }}</span>

                        <h3 class="text-gray-700 text-sm font-semibold">{{ $post->category }} - {{ $post->condition }}</h3>
                        <span><p class="text-gray-700 text-sm text-justify break all">{{ $post->body }}</p></span>
                    </div>
                    <div class="px-5 py-2">
                        <h3 class="text-gray-500 text-sm text-gray-100">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</h3> 
                    </div>
                    <div class="px-5 py-3 flex justify-center bottom-0">
                    
                    @auth

                        @if (!$post->likedBy(auth()->user()))
                            <form action="{{ route('posts.likes', $post) }}" method="post">
                                @csrf
                                <button class="inline-block w-full px-4 py-2 text-sm text-center text-white transition duration-200 bg-blue-700 rounded-lg hover:bg-blue-600 ease">Like</button>
                            </form>
                        @else    
                            <form action="{{ route('posts.likes', $post) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="inline-block w-full px-4 py-2 text-sm text-center text-white transition duration-200 bg-blue-700 rounded-lg hover:bg-blue-600 ease">Unlike</button>
                            </form>    
                        @endif
                        
                        <!-- Interested button --> 
                        @if (!$post->owner(auth()->user()))
                            @if (!$post->boughtBy(auth()->user()))
                                <span>
                                    <div class="ml-2">
                                        <form action="{{ route('posts.transactions', $post) }}" method="post">
                                            @csrf
                                            <button class="inline-block w-full px-4 py-2 text-sm text-center text-white transition duration-200 bg-yellow-600 rounded-lg hover:bg-yellow-500 ease">Interested</button>
                                        </form>
                                    </div>
                                </span>
                            @else
                                <span>
                                    <div class="ml-2">
                                        <form action="{{ route('posts.transactions', $post) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="inline-block w-full px-4 py-2 text-sm text-center text-white transition duration-200 bg-yellow-600 rounded-lg hover:bg-yellow-500 ease">UnInterested</button>
                                        </form>
                                    </div>
                                </span>
                            @endif
                        @endif

                        
                        @can('delete', $post)
                        <span>
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="ml-2">
                                    <button class="inline-block w-full px-4 py-2 text-sm text-center text-white transition duration-200 bg-red-600 rounded-lg hover:bg-red-500 ease">Delete</button>
                                </div>
                            </form>
                        </span>
                        @endcan

                    @endauth
                    </div>
                </div>
                @endforeach
                {{ $posts->links() }}
                
            </div>
            <br>
        </div>
    </main>
</div>

@endsection