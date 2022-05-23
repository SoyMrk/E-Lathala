@extends('layouts.app')

@section('content')
<section>
<!-- product -->
    <div class="pt-8 pb-2">        
        <main class="rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="bg-white my-0 px-4 py-6">
                
                <div class="md:flex my-0 md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full rounded-md max-w-lg mx-auto" src="https://images.unsplash.com/photo-1578262825743-a4e402caab76?ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80" alt="Nike Air">
                    </div>
                    <div class="w-full max-w-lg mx-auto md:w-1/2">
                        <h3 class="text-gray-700 uppercase text-lg">{{ $post->title }}</h3>
                        <span class="text-gray-500 mt-3">{{ $post->price }}</span>
                        <hr class="my-3">
                        <div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">Description: {{ $post->post_type }}, {{ $post->category }} <br> {{ $post->body }} </label>
                        </div>
                        <div class="flex justify-end"> 
                        @if ((auth()->user()->id === $post->sold_by_id) and (is_null($post->pending_at)))

                            @if ($already->count())
                                <form action="">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                                    font-medium justify-end" disabled>Already selling to other user</button>
                                </form>
                            @else
                                <form action="{{ route('transactions.sell') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="transaction_id" name="transaction_id" value="{{ $post->id }}">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                                    font-medium justify-end">Sell to this User</button>
                                </form>
                            @endif

                        @else
                            @if (auth()->user()->id === $post->sold_by_id)
                        
                                <form action="">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                                    font-medium justify-end" disabled>Now Selling to this User</button>
                                </form>
                          
                            @endif

                            @if ((!is_null($post->pending_at)) and (is_null($post->completed_at)) and (auth()->user()->id === $post->bought_by_id))

                                @if (session('status'))
                                    <div class="alert alert-success mr-4">
                                        {{ session('status') }}
                                    </div>
                                    <form action="{{ route('transactions.user',auth()->user()->id) }}" method="get">
                                        <button href="" class="bg-blue-500 text-white px-4 py-2 rounded
                                        font-medium justify-end">Redirect to Transactions</button>
                                    </form>
                                @else
                                    <form action="{{ route('transactions.buy') }}" method="post">
                                        @csrf
                                        <input type="hidden" id="transaction_id" name="transaction_id" value="{{ $post->id }}">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                                        font-medium justify-end">Item Received</button>
                                    </form>
                                @endif
                    
                            @endif

                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<!--message --> 
    <div class="pt-0 pb-8"> 
        <main class="rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class=" hidden w-full bg-white h-full lg:flex flex-col justify-start border-r-2 border-l-2 border-gray-100 lg:rounded-r-md xl:rounded-none">
                <!-- Header with name -->
                <div class="flex flex-row items-center justify-between px-3 py-2 bg-gray-50 bg-opacity-40 border-b-2 border-gray-100">
                    <div class="mx-2 my-2">
                        @if (auth()->user()->id === $post->bought_by->id)
                            <h2 class="text-gray-700  text-lg"> <b>Seller</b>   - {{ $post->sold_by->name }}</h2>
                        @else
                            <h2 class="text-gray-700  text-lg"> <b>Buyer</b>   - {{ $post->bought_by->name }}</h2>
                        @endif
                    </div>
                    <div class="flex flex-row">
                        <button type="button" class="p-2 ml-2 text-gray-400 rounded-full hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring" aria-label="Search">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                                <path d="M12.323,2.398c-0.741-0.312-1.523-0.472-2.319-0.472c-2.394,0-4.544,1.423-5.476,3.625C3.907,7.013,3.896,8.629,4.49,10.102c0.528,1.304,1.494,2.333,2.72,2.99L5.467,17.33c-0.113,0.273,0.018,0.59,0.292,0.703c0.068,0.027,0.137,0.041,0.206,0.041c0.211,0,0.412-0.127,0.498-0.334l1.74-4.23c0.583,0.186,1.18,0.309,1.795,0.309c2.394,0,4.544-1.424,5.478-3.629C16.755,7.173,15.342,3.68,12.323,2.398z M14.488,9.77c-0.769,1.807-2.529,2.975-4.49,2.975c-0.651,0-1.291-0.131-1.897-0.387c-0.002-0.004-0.002-0.004-0.002-0.004c-0.003,0-0.003,0-0.003,0s0,0,0,0c-1.195-0.508-2.121-1.452-2.607-2.656c-0.489-1.205-0.477-2.53,0.03-3.727c0.764-1.805,2.525-2.969,4.487-2.969c0.651,0,1.292,0.129,1.898,0.386C14.374,4.438,15.533,7.3,14.488,9.77z"></path>
                            </svg>
                        </button>
                        <button type="button" class="p-2 ml-2 text-gray-400 xl:text-blue-500 rounded-full hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring" aria-label="Open">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <g><rect fill="none" height="24" width="24"/><g><path d="M2,4v16h20V4H2z M20,8.67h-2.5V6H20V8.67z M17.5,10.67H20v2.67h-2.5V10.67z M4,6h11.5v12H4V6z M17.5,18v-2.67H20V18H17.5z"/></g></g>
                            </svg>
                        </button>
                        <button type="button" class="p-2 ml-2 text-gray-400 rounded-full hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring" aria-label="More">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path fill-rule="nonzero" d="M12,16 C13.1045695,16 14,16.8954305 14,18 C14,19.1045695 13.1045695,20 12,20 C10.8954305,20 10,19.1045695 10,18 C10,16.8954305 10.8954305,16 12,16 Z M12,10 C13.1045695,10 14,10.8954305 14,12 C14,13.1045695 13.1045695,14 12,14 C10.8954305,14 10,13.1045695 10,12 C10,10.8954305 10.8954305,10 12,10 Z M12,4 C13.1045695,4 14,4.8954305 14,6 C14,7.1045695 13.1045695,8 12,8 C10.8954305,8 10,7.1045695 10,6 C10,4.8954305 10.8954305,4 12,4 Z"/>
                            </svg>
                        </button>
                    </div>
                </div>   

                <!-- Messages -->
                <div class="flex flex-col justify-between">
                    <div class="flex flex-col">
                        <div class="flex h-screen p-2 px-4">
                            <div class="flex flex-1 justify-end overflow-y-scroll">
                                <ul class="p-4  break-all ">
                                            @if($transMessages->count() )
                                                @foreach ($transMessages as $message)
                                                    
                                                <li class="bg-gray-200 p-3 rounded-lg 
                                                    px-4 py-3 rounded-lg my-2 inline-block margin-auto">
                                                    <p class="text-xs">
                                                    <x-message :message="$message" />
                                                </li>
                                                <br>
                                                @endforeach
                                            
                                            
                                                </p>
                                            <div class="ml-2 flex flex-row text-xs text-gray-300">
                                                <span class="text-xs text-gray-500 absolute right-10 ">{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                            @else
                                                <h2 class="text-center">There are no messages</h2>
                                                @endif 
                                   
                                </ul>  
                            </div>
                        </div>
                    </div>
                </div> 
                
                <form action="{{ route('messages') }}" method="post" class="flex flex-row justify-between items-center p-3" >      
                    @csrf                        
                    <div class="flex-1 px-3">
                            <input name="body" id="body" cols="30" rows="3" class="w-full border-2 border-gray-100 rounded-full px-4 py-1 outline-none text-gray-500 focus:outline-none focus:ring @error('body') border-red-500 @enderror"
                                placeholder="Send Message"></input>
                                
                                <input type="hidden" id="transaction_id" name="transaction_id" value="{{ $post->id }}">
                                @error('body')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror 
                    </div>
                    <div class="flex flex-row">
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div> 
    <section>
@endsection