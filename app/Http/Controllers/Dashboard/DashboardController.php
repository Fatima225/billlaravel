<?php

namespace App\Http\Controllers\Dashboard;
use App\Category;
use App\Product;
use App\Client;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {


        $categories_count = Category::count() ;
        $products_count = Product::count() ;
        $clients_count = Client::count();
        //$users_count = User::count() ;
       $users_count = User::whereRoleIs('admin')->count() ;
    
    $sales_data = Order::select(
        DB::raw('YEAR(created_at) as year'),
        DB::raw('MONTH(created_at) as month'),
        DB::raw('SUM(created_at) as sum'),
    )->groupBy('month')->get();
    
    
    
          return view('dashboard.index', compact ('categories_count', 'products_count', 'clients_count','users_count','sales_data'));
       }

   
}
