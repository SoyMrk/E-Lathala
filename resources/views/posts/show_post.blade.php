@extends('layouts.app')

@section('content')

            @if($posts->count() )
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif

@endsection 