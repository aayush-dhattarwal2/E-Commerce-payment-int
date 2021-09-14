<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //
    public function viewProducts()
    {
        $products = DB::select('select * from products');
        return view('home', ['products'=>$products] );
    }

    public function addProduct(Request $request)
    {
        // dd($request);
        $request->validate([
            'productName' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            "price" => "required|numeric",
            'product_description' => 'required|max:1000'
        ]);
    
        $image = $request->file('image');

        $file = $request->file('image');
        $name = $request->file('image')->getClientOriginalName();
 
        
       $path = $file->move( 'images', $name );
        // dd($path);

        Products::create([
            'p_name' => $request->productName,
            'p_price' => $request->price,
            'p_description' => $request->product_description,
            'p_image' => $name,
            'p_image_path' => $path

        ]);
  

    
        return view('admin.Admindashboard')
            ->with('success','You have successfully upload Product.');   
    }

    public function cart()
    {

        return view('cart');

    }

    public function addToCart(Request $request){
        // dd($request->userId);
        // $userid = auth()->user()->id;
        if(isset($request->userId)){
        $request->validate([
            'cartId' => 'required|numeric',
        ]);

        Cart::create([
            'product_id' => $request->cartId,
            'userid' => $request->userId
        ]);

        $productid = $request->cartId;
        $userid = $request->userId;
        $inCart =  Products::leftJoin('carts', 'carts.product_id', '=', 'products.id')
        ->select('*')->where('carts.userid', $userid)->get();
        return view('posts.index', ['inCart'=>$inCart] );
    }
        else {
        return redirect('login');

        }

    }

    // public function __construct(){
    //     $this->middleware(['auth']);
    // }
}






        // dd($image);
        // $imageName = $request->image.'.'.$request->image->extension();  
        
        // $imageName = time().'.'.$image->getClientOriginalExtension();
        // $destinationPath = $image->move('/images');
        // $imageName=rand() . '.' . $image->getClientOriginalExtension();
        // $image->move($destinationPath, $imagename);
     
        // $request->image->store('images', 'public');

        // dd($imageName);
        // $path = $request->file('image')->store('public/images');