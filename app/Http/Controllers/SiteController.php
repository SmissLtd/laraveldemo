<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Config;
use App\Contact;
use App\Newsletter;

class SiteController extends Controller
{
    public function index()
    {
        $offerCategory = Category::find(Config::getValue(Config::INDEX_OFFERS_CATEGORY));
        $offerProducts = empty($offerCategory) ? [] : $offerCategory->products()->take(6)->get();
        $offerCategories = Category::where('is_special', true)->take(6)->get();
        $productsCategory = Category::find(Config::getValue(Config::INDEX_PRODUCTS_CATEGORY));
        $products = empty($productsCategory) ? [] : $productsCategory->products()->take(4)->get();
        return view('site.index', [
            'offerCategory' => $offerCategory,
            'offerProducts' => $offerProducts,
            'offerCategories' => $offerCategories,
            'products' => $products
        ]);
    }
    
    public function contact()
    {
        return view('site.contact', [
            'address' => Config::getValue('address'),
            'email' => Config::getValue('email'),
            'phone' => Config::getValue('phone_full')
        ]);
    }
    
    public function contactSubmit(Request $request)
    {
        $request->flash();
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:32',
            'message' => 'required'
        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        if (Auth::check())
            $contact->user_id = Auth::user()->id;
        $contact->save();
        return view('site.contacted');
    }
    
    public function newsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:newsletters'
        ]);
        if ($validator->fails())
            return ['success' => false, 'message' => implode("\n", $validator->messages()->all())];
        $model = new Newsletter();
        $model->email = $request->input('email');
        $model->save();
        return ['success' => true];
    }
}