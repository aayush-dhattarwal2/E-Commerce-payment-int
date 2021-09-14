@extends('layouts.master')
{{-- @extends('layouts.app') --}}

@section('title')
    Admin Dashboard | Aayush
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        @if (isset($success)) 
        <div class="bg-green-500 p-4  mb-6 text-white text-center">
            {{ $success }}
        </div>
        @endif
      <div class="card">
        <div class="card-header">
          <h1 class="card-title"> Add Products </h1>
        </div>
        

        <div class="flex justify w-full">
            <div class = "w-4/12 bg-white p-6 rounded-lg w-full">
                <form action="{{ route('upload_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="productName" class=" font-bold font-black">Product Name</label>
                        <input type="text" name="productName" id="productName" placeholder="Product Name" class="bg-grey-100 border-2 w-full p-4 rounderd-lg @error('productName') border-red-500 @enderror" value="{{ old('productName') }}">
                        @error('productName')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
        
                    <div class="mb-2">
                        <label for="price" class="font-bold font-black">Price</label>
                        <input type="number" name="price" id="price" placeholder="Enter Price" class="bg-grey-100 border-2 w-full p-4 rounderd-lg @error('price') border-red-500 @enderror" value="{{ old('price') }}">
                        @error('price')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
        
                    <div class="mb-2">
                        <label for="product_description" class="font-bold font-black">Product Description</label>
                        <textarea name="product_description" id="product_description" placeholder="Write product description here..." class="bg-grey-100 border-2 w-full p-4 rounderd-lg" value="{{ old('product_description') }}">
                        </textarea>
                        @error('product_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
             
            
 
                    <div class="mb-2"> <span class="text-lg font-bold text-gray-600 flec">Product Image</span>
                        <div class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                            <div class="absolute">
                                <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> <span class="block text-gray-400 font-normal">or</span> <span class="block text-blue-400 font-normal">Browse files</span> </div>
                            </div> <input type="file" class="h-full w-full opacity-0" name="image">
                        </div>
                        <div class="flex justify-between items-center text-gray-400"> <span class="flex items-center ">
                         </div>
                         @error('image')
                         <div class="text-red-500 mt-2 text-sm">
                             {{ $message }}
                         </div>
                         @enderror
                    </div>
                </div>
                </div>
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-10/12 ml-6 mb-10">Add Product</button>
                
            </form>
            
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

 <!--   Core JS Files   -->
 <script src="../assets/js/core/jquery.min.js"></script>
 <script src="../assets/js/core/popper.min.js"></script>
 <script src="../assets/js/core/bootstrap.min.js"></script>
 <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 <!--  Google Maps Plugin    -->
 <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!-- Chart JS -->
 <script src="../assets/js/plugins/chartjs.min.js"></script>
 <!--  Notifications Plugin    -->
 <script src="../assets/js/plugins/bootstrap-notify.js"></script>
 <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
 <script src="../assets/demo/demo.js"></script>

@endsection