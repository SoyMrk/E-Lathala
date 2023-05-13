@extends('layouts.app')

@section('content')


  <main class="bg-gray-900 h-screen">

    <div class="pt-10 pb-6 font-bold text-yellow-600 text-4xl text-center">List of Sold Items</div>

    <div class="flex items-center justify-center">
      <div class="table rounded-md w-3/4 bg-white">

<div class="table-header-group text-center rounded-lg">
    <div class="py-4 divide-x rounded-lg table-row bg-yellow-600 font-semibold text-lg">
      <div class="py-2 w-44 table-cell text-center">Name of Buyer
      </div>
      <div class="py-2 w-28 table-cell text-center">Type
              </div>
              <div class="table-cell w-40 text-center">Item Purchased
              </div>
              <div class="table-cell w-28  text-center mr-10">Price
              </div>
    </div>

</div>

<div class="table-row-group">
  <div class="table-row">
  @if($solds->count() )
            @foreach ($solds as $sold)
            <div class="py-2 table-cell text-center">{{ $sold->bought_by->name }}
            </div>
            <div class="table-cell text-center">{{ $sold->post_type }}
            </div>
            <div class="table-cell text-center">{{ $sold->title }}
            </div>
            <div class="table-cell text-center">{{ $sold->price }}
            </div>
    </div>
    @endforeach
              {{ $solds->links() }}
            @else
              <p class="py-10 px-10">There are no sold items yet</p>
            @endif
  </div>

</div>
</div>


    </div>
</div>
</main>

@endsection