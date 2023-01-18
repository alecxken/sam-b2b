<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Cart;

use App\Models\CustomerAddress;

use App\Models\Order;

use App\Models\Payments;

use App\DataTables\ProductDataTable;

use App\DataTables\CartDataTable;

use App\DataTables\CustomerAdressDataTable;

use App\DataTables\OrderDataTable;

use App\DataTables\OrderMineDataTable;

USE DB;

use Auth;

class ProductController extends Controller
{

 // This function generates a view with a data table of products
public function index(ProductDataTable $dataTable)
{
    // Render the view and pass the data table to it
    return $dataTable->render('product.index');
}

 // This function generates a view with a data table of products
public function view_myorders(OrderMineDataTable $dataTable)
{
    // Render the view and pass the data table to it
    return $dataTable->render('product.orders');
}


 // This function generates a view with a data table of products
public function view_addresses(CustomerAdressDataTable $dataTable)
{
    // Render the view and pass the data table to it
    return $dataTable->render('product.orders');
}

 // This function generates a view with a data table of products
public function view_orders(OrderDataTable $dataTable)
{
    // Render the view and pass the data table to it
    return $dataTable->render('product.orders');
}

 // This function generates a view with a data table of products
public function pay_product($id)
{
    // Render the view and pass the data table to it
    return $dataTable->render('product.orders');
}



 // This function generates a view with a data table of products
 public function my_order(CartDataTable $dataTable)
 {
   // $data = Cart::where('user_id',\Auth::user()->email);
     // Render the view and pass the data table to it
   if (Auth::check()) {

    $products = Product::all();
    // The user is authenticated...
     return $dataTable->with(['user_id'=> \Auth::user()->email,'token'=>csrf_token()])->render('product.myorders',compact('products'));
} else {
    return redirect('/login');
}

    

     return view('product.myorders',compact('data'));
 }

// This function stores a new product or updates an existing one
public function product_store(Request $request)
{
    // Check if the request has an "id" parameter, which indicates an update
    if (is_null($request['id'])) {
        // If "id" is not present, create a new product object
        $data = new Product();
    }
    else {
        // If "id" is present, find the existing product and update it
        $data =  Product::findorfail($request['id']);
    }

    // Set the token for the product
    $data->token = 'B2B-'.rand();

    // Set the product name and description
    $data->product_name = $request['product_name'];
    $data->product_desc = $request['description'];

    // Set the sell price and quantity
    $data->sell_price = $request['sell_price'];
    $data->quantity = $request['quantity'];

    // Set the category
    $data->category = $request['category'];

    // Check if the request has a file named "photos"
    $media = $request->file('photos');
    if($request->hasfile('photos')) {
        // If the request has a file, move it to the "products" folder and set the filename as the product's photo
        $destinationPath = public_path('products');
        $filename = $media->getClientOriginalName();
        $media->move($destinationPath, $filename);
        $data->photos = $filename;
    }

    // Set the status to "Active"
    $data->status = 'Active';

    // Save the product
    $data->save();

    // Redirect back with a status message
    return back()->with('status','success');
}

// This function retrieves a product by its id
public function get_product($id)
{
    // Find the product with the specified id and return it
    $data = Product::where('id',$id)->get()->first();
    return $data;
}

// This function retrieves a product by its id
public function getpayment_product($id)
{
      $paid= Payments::where('_token',$id)->sum('payment_amount');

      $data= Cart::where('_token',$id)->sum('price');

     return $data-$paid;

    }

// This function retrieves a product by its id
public function Storepayment_product(Request $request)
{
    // Find the product with the specified id and return it


    if ($request['total_paid'] >= $request['total_cost'] ) 
    {
        // code...
        $status = 'Paid';
    }
    elseif ($request['total_paid'] <= 0 )  {
        // code...
        $status = 'Unpaid';
    }
    else
    {
        $status = 'Partially Paid';
    }
    

     $qty= Cart::where('_token',$request['_token'])->sum('qty');

     $price= Cart::where('_token',$request['_token'])->sum('price');

    $data = new Order();
    $data->_token = 'EKE-'.rand(1000,100000);
    $data->order_by = \Auth::user()->email;
    $data->cart_ref =$request['_token'];
    $data->qty = $qty;
    $data->total = $price;
    $data->payment_ref = $request['pay_ref'];
    $data->payment_status = $status;
    $data->delivery_status = 'Pending';
    $data->save();

    $pay = new Payments();

    $pay->_token = $request['_token'];

    $pay->payment_amount = $request['total_paid'];

    $pay->payment_ref = $request['pay_ref'];

    $pay->payment_status = 'Complete';

    $pay->save();

    return redirect('myorders')->with('status','success');
}

  



// This function retrieves a product by its id
public function productdetails($id)
{
    // Find the product with the specified id and return it
    $data = Product::where('id',$id)->get()->first();
    return view('product.details',compact('data'));
}




// This function retrieves a product by its id
public function getproduct($id)
{
    // Find the product with the specified id and return it
    $prod = Product::where('id',$id)->get()->first();
    return view('product.productview',compact('prod'));
}

// This function retrieves a product by its id
public function checkoutproduct($id)
{
    // Find the product with the specified id and return it
    $prod = Cart::where('_token',$id)->get();

   // return $prod;

    return view('product.checkout',compact('prod'));
}

// This function deletes a product by its id
public function delete_product(Request $request)
{
    // Find the product with the specified id and delete it
    $data = Product::findorfail($request['ids']);
    $data->delete();

    // Redirect back with a status message
    return back()->with('info','success');
}


public function add_cart(Request $request)
{
    // code...
  //  return $request;
    $datas = Product::findorfail($request['product_id']);

   // return $datas;

    $data = new Cart();

    $data->_token = $request['_token'];

    $data->user_id = $request['user_id'];

    $data->product_id = $request['product_id'];

    $data->qty = $request['qty'];

    $data->price = ($datas->sell_price * $request['qty']);

    $data->save();

    return back()->with('info','success');

}

public function checkout_post(Request $request)
{
    # code...pk]k

    $data = new CustomerAddress();

    $data->_token = $request['_token'];

    $data->fname = $request['fname'];

    $data->lname = $request['lname'];

    $data->apartment = $request['apartment'];

    $data->city = $request['city'];

    $data->street = $request['street'];

    $data->phone = $request['phone'];

    $data->email = $request['email'];

    $data->order = $request['order'];

    $data->total = $request['total'];

    $data->radio = $request['radio'];

        $data->user_id = $request['email'];

    $data->save();

     \DB::table('carts')->where('_token', $request['_token'])
    ->update(['user_id'=>$request['email']]);

     $qty= Cart::where('_token',$request['_token'])->sum('qty');

     $price= Cart::where('_token',$request['_token'])->sum('price');

    $data = new Order();
    $data->_token = 'EKE-'.rand(1000,100000);
    $data->order_by = $request['email'];
    $data->cart_ref =$request['_token'];
  //  $data->short_desc = $;
    $data->qty = $qty;
    $data->total = $price;
    $data->payment_ref = '';
    $data->payment_status = 'Unpaid';
    $data->delivery_status = 'Pending';
    $data->save();

    return view('retaildash');



}

}