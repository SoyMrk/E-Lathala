@props(['message' => $message])

<div class="mb-4">
    <a href="" class="font-bold">{{ $message->user->name }}</a> <span class="text-gray-600 text-sm">{{ $message->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $message->message }}</p>

    @can('delete', $message)
        <form action="#" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan

</div>