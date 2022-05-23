@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.post', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $post->body }}</p>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan

    @auth
        @if (!$post->owner(auth()->user()))
        
            @if (!$post->boughtBy(auth()->user()))
                <form action="{{ route('posts.transactions', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Interested</button>
                </form> 
            @else
                <form action="{{ route('posts.transactions', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-blue-500">Uninterested</button>
                </form>
            @endif
        

            <div class="flex items-center">
        
                @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500"> Like</button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form> 
                    <span> {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                @endif
                
            </div>

        @endif
    @endauth
</div>