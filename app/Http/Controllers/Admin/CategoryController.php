<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function form(Category $model)
    {
        return view('admin.category.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:128',
            'is_special' => 'boolean',
            'discount' => 'integer|min:0|max:100',
            'photo' => 'required|image',
            'photo_big' => 'image'
        ]);
        if ($id = $request->input('id'))
            $model = Category::find($id);
        else
            $model = new Category();
        $model->name = $request->input('name');
        $model->is_special = $request->input('is_special');
        $model->discount = $request->input('discount');
        $photo = $request->file('photo');
        $model->photo = time() . '-' . $photo->getClientOriginalName();
        $photo->move(public_path('/photos'), $model->photo);
        if ($request->hasFile('photo_big'))
        {
            $photo = $request->file('photo_big');
            $model->photo_big = time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path('/photos'), $model->photo_big);
        }
        else
            $model->photo_big = null;
        $model->save();
        $request->session()->flash('message', 'Category has been successfully saved');
        return redirect('/admin/categories');
    }
    
    public function delete(Request $request)
    {
        Category::destroy($request->input('id'));
    }
}
