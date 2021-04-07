<?php

namespace App\Http\Controllers;

use App\Category;
use App\Charts\Click;
use App\Charts\Orders;
use App\Charts\Product as ChartsProduct;
use App\Charts\User as ChartsUser;
use App\Color;
use App\FrequentClick;
use App\OrderDetail;
use App\Size;
use App\Product;
use App\User;
use App\vistors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // $query->when(isset($request->search), function ($query) use ($request) {
        //     return $query->where('title', 'like', trim($request->search).'%');
        // });

        // $query->when( isset($request->status), function ($query) use ($request) {
        //     return $query->where('status', '=', (int) $request->status);
        // });

        $products = $query->orderBy('created_at', 'DESC')->paginate(10);
        $products->appends(request()->query());

        return view('admin.product.list', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function show(Request $request)
    {
        $users = User::all();

        return view('admin.customerdetails', compact(['users']));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    
  

    public function gotowebsite(Request $request)
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

        $products = $query->orderBy('created_at')->get();
        // $products->appends(request()->query());
       $categories=Category::all();
       $colors=Color::all();
       $sizes=Size::all();
        return view('accounts.home', compact(['products','colors','categories','sizes']));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
    public function charts()
    {
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $products = Product::select('category_id', DB::raw('count(*) as total'))->groupBy('category_id')->orderBy('total', 'DESC')->get();
        $usersmcount = [];
        $userCount = [];
        $monthName = [];

        for ($i = 1; $i <= 12; $i++) {
            $usersmcount[$i] = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->distinct('id')->count('id');
        }

        $month = array_keys($usersmcount, max($usersmcount));

        $top_month_name = date("F", mktime(0, 0, 0, $month[0], 10));

        $index = 0;
        foreach ($usersmcount as $key => $count) {

            $monthName[$index] = strtoupper(date("M", mktime(0, 0, 0, $key, 10)));
            $userCount[$index] = $count;
            $index++;
        }




        $labels = array();
        $data = array();




        foreach ($products as $product) {

            array_push($labels, $product->category->name);
            array_push($data, $product->total);
        }



        $chart = new ChartsProduct;
        $chart->minimalist(true);
        $chart->displaylegend(true);
        $chart->height(200);
        $chart->labels($labels);
        $chart->dataset('Sold', 'pie', $data)
            // ->color('#1d8cf8')
            // ->backgroundcolor('rgba(29,140,248,0.1)')
            ->color($fillColors)
            ->backgroundcolor($fillColors)
            ->linetension(0.0);
        // $chart->dataset('Categories Chart', 'bar', $data)->options([
        //     'fill' => 'true',
        //     'fillColors' => $fillColors
        // ]);
        $userchart = new ChartsUser;
        $userchart->minimalist(false);
        $userchart->displaylegend(false);
        $userchart->height(200);
        $userchart->labels($monthName);
        $userchart->dataset('Sold', 'line', $userCount)
            // ->color('#1d8cf8')
            // ->backgroundcolor('rgba(29,140,248,0.1)')
            ->color('blue')
            ->fill(false)
            ->linetension(0.0);


        $order = OrderDetail::select('product_id', DB::raw('count(*) as total'))->groupBy('product_id')->orderBy('total', 'DESC')->take(5)->get();
        $orderlabels = array();
        $orderdata = array();
        foreach ($order as $orders) {
            array_push($orderlabels, $orders->product->name);
            array_push($orderdata, $orders->total);
        }

        $orderchart = new Orders;
        $orderchart->minimalist(false);
        $orderchart->displaylegend(false);
        $orderchart->height(200);
        $orderchart->labels($orderlabels);
        $orderchart->dataset('Sold', 'line', $orderdata)
            // ->color('#1d8cf8')
            // ->backgroundcolor('rgba(29,140,248,0.1)')
            ->color('violet')
            ->fill(false)
            ->linetension(0.0);

        $clicks=FrequentClick::select('product_id', DB::raw('count(*) as total'))->groupBy('product_id')->orderBy('total', 'DESC')->take(5)->get();
       
        $clicklabels = array();
        $clickdata = array();

        foreach ($clicks as $click) {
            array_push($clicklabels, $click->product->name);
            array_push($clickdata, $click->total);
        }

        $clickschart = new Click;
        $clickschart->minimalist(false);
        $clickschart->displaylegend(false);
        $clickschart->height(200);
        $clickschart->width(0);
        $clickschart->labels($clicklabels);
        $clickschart->dataset('Sold', 'bar', $clickdata)
            // ->color('#1d8cf8')
            // ->backgroundcolor('rgba(29,140,248,0.1)')
            ->color('violet')
            ->fill(false)
            ->linetension(0.0);

            $vistors=vistors::count();

        return view('charts.index', compact('chart', 'orderchart','userchart','clickschart','vistors'));
    }
}
