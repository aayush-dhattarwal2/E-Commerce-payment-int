@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <section class="container mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Product Name</th>
              <th class="px-4 py-3">Price</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Added On</th>
              <th class="px-4 py-3">Checkout</th>

            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($inCart as $cart)
            <tr class="text-gray-700">
              <td class="px-4 py-3 border">
                <div class="flex items-center text-sm">
                  <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="{{ asset($cart->p_image_path)}}" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold text-black">{{ $cart->p_name }}</p>
                    <p class="text-xs text-gray-600">{{ $cart->p_description }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-ms font-semibold border">{{ $cart->p_price }} $</td>
              <td class="px-4 py-3 text-xs border">
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> In Cart </span>
              </td>
              <td class="px-4 py-3 text-sm border">{{ $cart->updated_at }}</td>
              <td class="px-4 py-3 text-xs border">

                <form action="{{route('stripe')}}" method="get">
                  @csrf
                  <input type="hidden" name="price" value="{{$cart->p_price}}">
                  <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" value="Checkout" />
                </form>
                  
               
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection