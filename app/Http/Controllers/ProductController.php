<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\FrequentClick;
use App\Product;
use App\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.product.Addproduct', compact(['colors', 'categories', 'sizes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->size_id = $request->size_id;
        $product->color_id = $request->color_id;
        $product->stocks = $request->stock;

        $product->price = $request->price;

        $storeFolderName = 'product-image';
        $productPrefix      = $product->name;
        $uploadedTime    = time();

        if (isset($request->image)) {

            $imageFileName = $productPrefix . $uploadedTime . '.' . request()->image->getClientOriginalExtension();
            $imageFilePath = $request->image->storeAs($storeFolderName, $imageFileName);
            $product->image  = $imageFilePath;
        }

        $product->save();
        return redirect(route('admin.product.list'));
    }
    public function Productdetail()
    {
        $products = Product::all();


        return view('admin.product.productdetails', compact(['products']));
    }
    public function Imagedetail($id)
    {
        $product = Product::findorfail($id);
        $sizes = Size::all();
        $colors = Color::all();
        #click 
        $clicks = FrequentClick::where('user_id',auth()->user()->id )->where('product_id',$product->id)->whereDate('created_at', Carbon::now())->first();
        if (empty($clicks->id)) {
            $clicks = new FrequentClick();
            $clicks->user_id = auth()->user()->id;
            $clicks->product_id = $product->id;
            $clicks->session_id = session()->getid();
        }
        $clicks->click_count = (int)($clicks->click_count) + 1;
        $clicks->save();
        return view('accounts.details', compact(['product', 'sizes', 'colors']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $products = Product::findOrFail($id);
        $colors = Color::all();
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.product.editProduct', compact(['products', 'colors', 'categories', 'sizes']));
    }

    public function Edit($id, Request $request)
    {
       
        $products = Product::findOrFail($id);

        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->description = $request->description;
        $products->size_id = $request->size_id;
        $products->color_id = $request->color_id;
        $products->price = $request->price;
        $storeFolderName = 'product-image';
        $productPrefix      = $products->name;
        $uploadedTime    = time();

        if (isset($request->image)) {

            $imageFileName = $productPrefix . $uploadedTime . '.' . request()->image->getClientOriginalExtension();
            $imageFilePath = $request->image->storeAs($storeFolderName, $imageFileName);
            $products->image  = $imageFilePath;
        }
        $products->stocks = $request->stock;
        $products->save();
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->back();
    }
}
