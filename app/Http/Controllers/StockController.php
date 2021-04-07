<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock()
    {
        $products=Product::all();
        return view('admin.stock',compact(['products']));

    }
    public function editstock()
    {
        $products=Product::all();
        return view('admin.editstock',compact(['products']));

    }
}
