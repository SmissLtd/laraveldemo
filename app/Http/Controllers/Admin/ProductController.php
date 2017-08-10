<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Tag;
use App\Brand;
use App\ProductTag;
use App\CategoryProduct;

class ProductController extends Controller
{
    public function form(Product $model)
    {
        return view('admin.product.form', [
            'model' => $model,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }
    
    public function submit(Request $request)
    {
        if ($id = $request->input('id'))
            $model = Product::find($id);
        else
            $model = new Product();
        $rules = [
            'name' => 'required|max:64',
            'name_long' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'photo_big1' => 'image',
            'photo_big2' => 'image',
            'photo_big3' => 'image',
        ];
        if (empty($model->photo))
            $rules['photo'] = 'required|image';
        else
            $rules['photo'] = 'image';
        $this->validate($request, $rules);
        $model->name = $request->input('name');
        $model->name_long = $request->input('name_long');
        $model->description = $request->input('description');
        $model->price = $request->input('price');
        $model->brand_id = $request->input('brand_id');
        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $model->photo = time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('/images'), $model->photo);
        }
        if ($request->hasFile('photo_big1'))
        {
            $photo = $request->file('photo_big1');
            $model->photo_big1 = time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('/images'), $model->photo_big1);
        }
        else if ($request->input('delete_photo_big1'))
            $model->photo_big1 = null;
        if ($request->hasFile('photo_big2'))
        {
            $photo = $request->file('photo_big2');
            $model->photo_big2 = time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('/images'), $model->photo_big2);
        }
        else if ($request->input('delete_photo_big2'))
            $model->photo_big2 = null;
        if ($request->hasFile('photo_big3'))
        {
            $photo = $request->file('photo_big3');
            $model->photo_big3 = time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('/images'), $model->photo_big3);
        }
        else if ($request->input('delete_photo_big3'))
            $model->photo_big3 = null;
        $model->save();
        // Categories
        $list = CategoryProduct::where('product_id', $model->id)->withTrashed()->get();
        $exists = [];
        foreach ($list as $item)
            $exists[$item->category_id] = $item;
        $categories = $request->input('category', []);
        foreach ($categories as $id => $on)
            if (Category::find($id))
                if ($on)
                {
                    if (!isset($exists[$id]))
                        CategoryProduct::create(['product_id' => $model->id, 'category_id' => $id]);
                    else if ($exists[$id]->deleted_at)
                    {
                        $exists[$id]->deleted_at = null;
                        $exists[$id]->save();
                    }
                }
                else if (isset($exists[$id]) && empty($exists[$id]->deleted_at))
                    $exists[$id]->delete();
        // Tags
        $list = ProductTag::where('product_id', $model->id)->withTrashed()->get();
        $exists = [];
        foreach ($list as $item)
            $exists[$item->tag_id] = $item;
        $tags = $request->input('tag', []);
        foreach ($tags as $id => $on)
            if (Tag::find($id))
                if ($on)
                {
                    if (!isset($exists[$id]))
                        ProductTag::create(['product_id' => $model->id, 'tag_id' => $id]);
                    else if ($exists[$id]->deleted_at)
                    {
                        $exists[$id]->deleted_at = null;
                        $exists[$id]->save();
                    }
                }
                else if (isset($exists[$id]) && empty($exists[$id]->deleted_at))
                    $exists[$id]->delete();
        $request->session()->flash('message', 'Product has been successfully saved');
        return redirect('/admin/products');
    }
    
    public function delete(Request $request)
    {
        Product::destroy($request->input('id'));
    }
}
