<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\User;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function myprofile()
    {  $user=User::findorfail(auth()->user()->id);
        return view('accounts.myprofile',compact(['user']));
    }
    public function profileedit($id,Request $request)
    {  
        $users=User::findorfail($id);
       
        $users->name = $request->name;
        $users->mobile = $request->mobile;
        $users->address = $request->address;
        $users->pincode = $request->pincode;
        $users->city = $request->city;
        $users->state = $request->state;
       
        $users->save();
        return redirect()->back();

    }
    
    public function feedback()
    {  $user=User::findorfail(auth()->user()->id);
        return view('accounts.feedback',compact(['user']));
    }
    public function store(Request $request)
    {  
       
        $feedback=new Feedback();
        
        $feedback->user_id=auth()->user()->id;
        $feedback->description=$request->description;
        $feedback->save();
        return redirect()->back();

    }
    
}
