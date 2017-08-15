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
        return view('admin.settings', [
            'categories' => Category::all()
        ]);
    }
    
    public function submitSettings(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone_full' => 'required|max:255',
            'phone_short' => 'required|max:255',
            'index_offers_category' => 'required|exists:categories,id',
            'index_products_category' => 'required|exists:categories,id'
        ]);
        Config::setValue('address', $request->input('address'));
        Config::setValue('email', $request->input('email'));
        Config::setValue('phone_full', $request->input('phone_full'));
        Config::setValue('phone_short', $request->input('phone_short'));
        Config::setValue('index_offers_category', $request->input('index_offers_category'));
        Config::setValue('index_products_category', $request->input('index_products_category'));
        $request->session()->flash('message', 'Settings have been successfully saved');
        return redirect('/admin/settings');
    }
}