@extends('layouts.app')

@section('content')


  <main class="bg-gray-900 h-screen">

    <div class="pt-10 pb-6 font-bold text-yellow-600 text-4xl text-center">List of Bought Items</div>

    <div class="flex items-center justify-center">
      <div class="table rounded-md w-3/4 bg-white">

        <div class="table-header-group text-center rounded-lg">
            <div class="py-4 divide-x rounded-lg table-row bg-yellow-600 font-semibold text-lg">
              <div class="py-2 w-44 table-cell text-center">Name of Items
              </div>
              <div class="py-2 w-28 table-cell text-center">Type
              </div>
              <div class="table-cell w-32 text-center">Seller
              </div>
              <div class="table-cell w-24  text-center mr-10">Price
              </div>
              <div class="table-cell w-28 text-center">Date Purchased
              </div>
            </div>

        </div>

        <div class="table-row-group">
          <div class="table-row">
            @if($boughts->count() )
            @foreach ($boughts as $bought)
            <div class="py-2 table-cell text-center">{{ $bought->title }}
            </div>
            <div class="table-cell text-center">{{ $bought->post_type }}
            </div>
            <div class="table-cell text-center">{{ $bought->sold_by->name }}
            </div>
            <div class="table-cell text-center">{{ $bought->price }}
            </div>
            <div class="table-cell text-center">{{ $bought->created_at->diffForHumans() }}
            </div>
            </div>
            @endforeach
              {{ $boughts->links() }}
            @else
              <p class="py-10 px-10">You have not purchased any items yet</p>
            @endif 
          </div>

        </div>
      </div>
    </div>
</div>
</main>

@endsection