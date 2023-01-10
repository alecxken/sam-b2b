<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Cart;

use App\DataTables\ProductDataTable;

class ProductController extends Controller
{

 // This function generates a view with a data table of products
public function index(ProductDataTable $dataTable)
{
    // Render the view and pass the data table to it
    return $dataTable->render('product.index');
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

    $data = new Cart();

    $data->_token = $request['_token'];

    $data->user_id = $request['user_id'];

    $data->product_id = $request['product_id'];

    $data->qty = $request['qty'];

    $data->price = ($request['sell_price'] * $request['qty']);

    $data->save();

    return back()->with('info','success');

}

}
