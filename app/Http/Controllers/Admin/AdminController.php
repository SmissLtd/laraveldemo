<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Config;
use App\Brand;
use App\Tag;
use App\Category;
use App\Product;
use App\Order;
use App\Contact;
use App\Newsletter;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'brands' => Brand::count(),
            'tags' => Tag::count(),
            'categories' => Category::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
            'newOrders' => Order::where('status', Order::STATUS_NEW)->count(),
            'contacts' => Contact::count(),
            'newContacts' => Contact::where('status', Contact::STATUS_NEW)->count(),
            'newsletters' => Newsletter::count(),
            'users' => User::count(),
        ]);
    }
    
    public function brands()
    {
        return view('admin.brands', [
            'models' => Brand::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function tags()
    {
        return view('admin.tags', [
            'models' => Tag::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function categories()
    {
        return view('admin.categories', [
            'models' => Category::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function products()
    {
        return view('admin.products', [
            'models' => Product::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function orders()
    {
        return view('admin.orders', [
            'models' => Order::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function contacts()
    {
        return view('admin.contacts', [
            'models' => Contact::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function newsletters()
    {
        return view('admin.newsletters', [
            'models' => Newsletter::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function users()
    {
        return view('admin.users', [
            'models' => User::paginate(Config::ADMIN_PAGE_SIZE)
        ]);
    }
    
    public function settings()
    {
        return view('admin.sessings');
    }
    
    public function submitSettings(Request $request)
    {
        
    }
}