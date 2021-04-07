<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\search;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function home(Request $request)
    {   
      
        $query = Product::query();

        $query->when(isset($request->search), function ($query) use ($request) {
            return $query->where('name', 'like', '%'.trim($request->search).'%');
        });
        $query->when(isset($request->category), function ($query) use ($request) {
            return $query->where('category_id', $request->category);
        });
        $query->when(isset($request->color), function ($query) use ($request) {
            return $query->where('color_id', $request->color);
        });
        $query->when(isset($request->size), function ($query) use ($request) {
            return $query->where('size_id', $request->size);
        });
        $query->when(isset($request->price), function ($query) use ($request) {
           
            return $query->where('price','<=',(int) $request->price);
        });



        // $query->when( isset($request->status), function ($query) use ($request) {
        //     return $query->where('status', '=', (int) $request->status);
        // });

        $products = $query->orderBy('created_at')->where('status',1)->get();
        // $products->appends(request()->query());
       $categories=Category::all();
       $colors=Color::all();
       $sizes=Size::all();
       #search operation
       $searches= new Search();
       $searches->search_term = $request->search;
       $searches->category_id=$request->category;
       $searches->color_id=$request->color;
       $searches->price=$request->price;
       $searches->user_id=auth()->user()->id;
       $searches->session_id=session()->getId();
       $searches->save();


        return view('accounts.home', compact(['products','colors','categories','sizes']));

    }

    public function search()
    {   
        $searches=Search::all();
       
        return view('preference.search',compact(['searches']));

    }
}
