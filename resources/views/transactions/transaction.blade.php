@extends('layouts.app')

@section('content')

<!-- component -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <style>
      section {
        height: 90vh;
      }
    </style>

  </head>
  <div class="bg-gray-900">
    <div class="container mx-auto">
        <div class="">
            <div class="w-full text-yellow-600 font-sans text-4xl font-bold tracking-wider">
                <br>
                <h1 class="flex justify-center">TRANSACTION</p>
            </div>
        </div>
    </div>
    <div class="h-screen p-6">
      <section class="px-20 rounded-md w-full lg:w-12/12 lg:mx-auto flex">
        <!-- Left section -->
        <div class="w-full flex flex-col justify-start items-stretch bg-transparent rounded-md lg:rounded-none lg:rounded p-3 mr-4 overflow-y-auto">
            <div class="flex block justify-center px-6 py-2 bg-yellow-200 rounded-md">
                <h1 class="font-bold font-4xl">E-Lathala Cart</h1>
            </div>
            <div class="flex-auto flex flex-col">
                <div class="flex-auto flex flex-row">
                <div class="w-full pt-2">
              
                <ul class="overflow-y-auto">
                <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-4">
                  @if($boughts->count() ) 
                  @foreach($boughts as $bought)
                    <div class="container bg-white hover:bg-yellow-200 rounded">
                    <li class="p-2 my-2 flex flex-row cursor-pointer">
                        <a  href="{{ route('messages',['id'=>$bought['id']]) }}">
                        <div class="w-full flex flex-col">
                          <div class="flex flex-row justify-between gap-6 items-center">
                            <h2 class="text-md  font-bold underline">{{ $bought->sold_by->name }} </h2>
                            <div class="text-md flex flex-row">
                              <span class="text-xs text-gray-400">
                              {{ $bought->created_at->diffForHumans() }}
                              </span>
                            </div>
                          </div>
                         
                          <div class="flex flex-row justify-between items-center py-2">
                            <p class="text-lg text-gray-900">{{ $bought->title }}</p>
                          </div>
                          <div class="flex flex-row justify-between items-center pb-2">
                            <p class="text-sm text-gray-900">{{ $bought->category }}</p>
                          </div>
                           <span class="text-lg text-gray-900 text-yellow-700 font-semibold">{{ $bought->price }}</span>
                        </div>
                        </a>
                      </li>
                      </div>
                    @endforeach
                      
                  @else
                      <p class="text-white">You do not have any items in your cart</p>
                  @endif
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Right section -->
        <div class="w-96 flex flex-col items-stretch  rounded-md lg:rounded-none lg:rounded p-3 overflow-y-auto ml-19">
          <div class="flex block justify-center px-6 py-2 bg-yellow-200 rounded-md">
              <h1 class="font-bold font-4xl">Selling List</h1>
            </div>
            
            <div class="pt-4 flex-auto flex flex-col">
                <div class="flex-auto flex flex-row">
                  <div class="w-full p-1 rounded-md">

                  <ul class="overflow-y-auto">
                    @if($solds->count() )
                        @foreach ($solds as $sold)
                      <!-- Card 1 -->
                      <div class="grid col-span-4 relative">
                        <a class="group  duration-200 delay-75 w-full bg-white rounded-sm py-4 pl-9" href="{{ route('messages',['id'=>$sold['id']]) }}">

                          <!-- Title -->
                          <p class="text-medium font-bold text-gray-700 group-hover:text-black"> {{ $sold->title }} </p>

                          <!-- Price -->
                          <p class="text-sm font-semibold text-yellow-500 group-hover:text-yellow-700 mt-2 leading-4"> {{ $sold->price }} </p>

                          <!-- Color -->
                          <div class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0"> 
                          </div>
                        </a>
                      </div>
                      @endforeach   
                    @else
                    <p  class="text-white">There are no items here</p>
                    @endif 
                  </ul>
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</html>


@endsection