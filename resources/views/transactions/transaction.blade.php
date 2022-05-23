@extends('layouts.app')

@section('content')

<!-- component -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./assets/styles/styles.css" /> -->
    <style>
      body {
        background: url('https://i.redd.it/iibrptucse951.png');
        background-repeat: no-repeat;
        background-size: cover;
      }

      section {
        height: 80vh;
      }

      .search-input {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' d='M18.109,17.776l-3.082-3.081c-0.059-0.059-0.135-0.077-0.211-0.087c1.373-1.38,2.221-3.28,2.221-5.379c0-4.212-3.414-7.626-7.625-7.626c-4.212,0-7.626,3.414-7.626,7.626s3.414,7.627,7.626,7.627c1.918,0,3.665-0.713,5.004-1.882c0.006,0.085,0.033,0.17,0.098,0.234l3.082,3.081c0.143,0.142,0.371,0.142,0.514,0C18.25,18.148,18.25,17.918,18.109,17.776zM9.412,16.13c-3.811,0-6.9-3.089-6.9-6.9c0-3.81,3.089-6.899,6.9-6.899c3.811,0,6.901,3.09,6.901,6.899C16.312,13.041,13.223,16.13,9.412,16.13z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: left 0.75rem center;
        background-size: 0.9rem 1.25rem;
      }
    </style>
  </head>
  <body class="h-screen">
    <div class="h-screen p-5">
      <section class="shadow-xl rounded-md w-full lg:w-12/12 lg:mx-auto flex">
        <!-- Left section -->
        <div class="w-full lg:w-3/6 xl:w-3/6 flex flex-col justify-start items-stretch bg-white rounded-md lg:rounded-none lg:rounded-l-md p-3 mr-4 overflow-y-auto">
            <div class="flex flex-row items-center justify-between px-3 py-2 bg-gray-50 border-b-2 border-gray-100">
                <div class="">
                <h2 class="font-medium">Interested List</h2>
                </div>
            </div>
            <div class="flex-auto flex flex-col">
                <div class="flex-auto flex flex-row">
                <div class="w-full p-1">
                <div class="w-full p-1">
                  <input
                    type="text"
                    placeholder="Search"
                    class="search-input bg-gray-600 bg-opacity-10 placeholder-gray-500 text-gray-400 text-sm py-1 px-10 rounded-md outline-none w-full focus:outline-none focus:ring" />
                </div>

                <ul class="overflow-y-auto">
                @if($boughts->count() ) 
                  @foreach($boughts as $bought)
                    <li class="my-2 p-2 flex flex-row cursor-pointer rounded-lg hover:bg-blue-100 hover:bg-opacity-50">
                      <a  href="{{ route('messages',['id'=>$bought['id']]) }}">
                      <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/gettyimages-997145684-1547233351.jpg?crop=1xw:1xh;center,top&resize=480:*" class="h-12 w-12 rounded-full mr-4" alt="">
                      <div class="w-full flex flex-col justify-center ">
                        <div class="flex flex-row justify-between items-center">
                          <h2 class="text-xs font-bold"> {{ $bought->sold_by->name }}  </h2>
                          
                            <span class="text-xs text-gray-400">
                              &nbsp;{{ $bought->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="flex flex-row justify-between items-center">
                          <p class="text-xs text-gray-500">{{ $bought->title }}</p>
                        </div>
                        <div class="flex flex-row justify-between items-center">
                          <p class="text-xs text-gray-500">{{ $bought->category }}</p>
                        </div>
                      </div>
                      </a>
                    </li>
                  @endforeach
                    
                @else
                    <p>There are no posts</p>
                @endif
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
       
        <!-- Left section -->
        <div class="w-full lg:w-3/6 xl:w-3/6 flex flex-col justify-start items-stretch bg-white border-r-2 border-l-2 border-gray-100 rounded-md lg:rounded-none lg:rounded-l-md p-3 overflow-y-auto ml-19">
            <div class="flex flex-row items-center justify-between px-3 py-2 bg-gray-50 border-b-2 border-gray-100">
                <div class="">
                <h2 class="font-medium">Selling List</h2>
                </div>
            </div>
            
            <div class="flex-auto flex flex-col">
                <div class="flex-auto flex flex-row">
                  <div class="w-full p-1">

                  <ul class="overflow-y-auto">
                    @if($solds->count() )
                        @foreach ($solds as $sold)
                      <!-- Card 1 -->
                      <div class="grid col-span-4 relative">
                        <a class="group shadow-lg hover:shadow-2xl duration-200 delay-75 w-full bg-white rounded-sm py-6 pr-6 pl-9" href="{{ route('messages',['id'=>$sold['id']]) }}">

                          <p class="text-small font-bold text-gray-700 "> Buyer - {{ $sold->bought_by->name }}  </p>

                          <!-- Title -->
                          <p class="text-small font-bold text-gray-500 group-hover:text-gray-700"> {{ $sold->title }} </p>

                          <!-- Description -->
                          <p class="text-sm text-gray-500 group-hover:text-gray-700 mt-2 leading-4"> {{ $sold->body }} </p>

                          <!-- Color -->
                          <div class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0"> 
                          </div>
                        </a>
                      </div>
                      @endforeach   
                    @else
                    <p>There are no posts</p>
                    @endif 
                  </ul>
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>


@endsection