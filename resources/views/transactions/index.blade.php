@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">Transactions</h1>
                <p>Transactions will be posted here</p>
                
            </div>
            
            <div class="bg-white p-6 rounded-lg mb-1">
                <h1 class="mb-4"> <b>Buying</b> </h1>
                @if($boughts->count() )
                    @foreach ($boughts as $bought)
                        <div class="mb-4">
                            <a class="font-bold">{{ $bought->sold_by->name }}</a> <span class="text-gray-600 text-sm">{{ $bought->created_at->diffForHumans() }}</span>
                            <br>
                            
                            <a href="{{ route('messages',['id'=>$bought['id']]) }}" class="mb-2">{{ $bought->body }}</a>
                            
                        </div>
                    @endforeach
                    {{ $boughts->links() }}
                @else
                    <p>There are no posts</p>
                @endif 
            </div>


            <div class="bg-white p-6 rounded-lg">
                <h1 class="mb-4"> <b>Selling</b> </h1>
                @if($solds->count() )
                    @foreach ($solds as $sold)
                        <div class="mb-4">
                            <a  class="font-bold">{{ $sold->sold_by->name }}</a> <span class="text-gray-600 text-sm">{{ $sold->created_at->diffForHumans() }}</span>
                            <br>
                            
                            <a href="{{ route('messages',['id'=>$sold['id']])}} " class="mb-2">{{ $sold->body }}</a>

                        </div>
                    @endforeach
                    {{ $solds->links() }}
                @else
                    <p>There are no posts</p>
                @endif 
            </div>
        </div>
    </div> 
@endsection