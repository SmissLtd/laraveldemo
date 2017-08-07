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
        return view('admin.dashboard');
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
        return 'categories';
    }
    
    public function products()
    {
        return 'products';
    }
    
    public function orders()
    {
        return 'orders';
    }
    
    public function contacts()
    {
        return 'contacts';
    }
    
    public function newslatters()
    {
        return 'newslatters';
    }
    
    public function users()
    {
        return 'users';
    }
    
    public function settings()
    {
        return 'settings';
    }
}