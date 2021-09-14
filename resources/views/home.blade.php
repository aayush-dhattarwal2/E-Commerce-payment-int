@extends('layouts.app')

@section('content')
<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-5">


  @foreach ($products as $product)
  <div class="w-full lg:max-w-full lg:flex">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{ asset($product->p_image_path)}}" alt="{{ $product->p_image}}')" title="River">
    </div>
    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      <div class="mb-8">
       
        <div class="text-gray-900 font-bold text-xl mb-2">{{ $product->p_name }}</div>
        <p class="text-gray-700 text-base">{{ $product->p_description }}</p>
      </div>
      <div class="flex items-center">
  
        <div class="text-sm">
          <p class="text-gray-600">Price: </p>
          <p class="text-gray-900 leading-none">{{ $product->p_price }} $</p>  
        </div>
        <div class="flex items-center">
          
        </div>
        
      </div>
      <form action="{{ route('addToCart') }}" method="post">
        @csrf
        @auth
        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">

        @endauth
        <input type="hidden" name="cartId" value="{{ $product->id }}">
         
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-10/12 mt-8 ml-6 mb-10">Add To Cart</button>
     </form>
    </div>
  </div>
  @endforeach
  
</div>
</div>

@endsection