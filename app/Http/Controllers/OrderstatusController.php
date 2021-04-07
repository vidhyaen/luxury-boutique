<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Orderstatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderstatusController extends Controller
{
   //
   
   public function create()
   {
      $orders = Order::orderBy('id', 'asc')->get();
      return view('admin.order', compact(['orders']));
   }
   public function orderdetails($id)
   {
      $order = Order::find($id);
      $orderstatuses = Orderstatus::all();
      return view('admin.orderdetails', compact(['order', 'orderstatuses']));
   }
   public function orderstatus($id, Request $request)
   {
      $order = Order::find($id);
      $order->order_status_id = $request->status;
      $order->delivery_date = $request->status == 5 ? Carbon::now() : null;
      $order->save();
      return redirect()->back();
   }
   public function Addstatus()
   {
      
      return view('admin.variant.addstatus');
      }
   public function store(Request $request)
      {
          $order_statuses= new Orderstatus();
          $order_statuses->name =$request->name;
          $order_statuses->status=isset($request->status) ? 1 : 0;
          $order_statuses->save();
           return redirect()->back();
      }
  
   public function status()
   {
      $order_statuses=Orderstatus::all();
      return view('admin.variant.Status',compact(['order_statuses']));
      }
      public function show($id)
    {   $order_statuses= Orderstatus::findOrFail($id);
        return view('admin.variant.editstatus',compact(['order_statuses']));
    }
    public function editstatus($id,Request $request)
    {
         $order_statuses = Orderstatus::findOrFail($id);
         $order_statuses->name=$request->name;
         $order_statuses->save();
        return redirect()->back();
     
    }
}
