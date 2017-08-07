<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public function form(Brand $model)
    {
        return view('admin.brand.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:128'
        ]);
        if ($id = $request->input('id'))
            $model = Brand::find($id);
        else
            $model = new Brand();
        $model->name = $request->input('name');
        $model->save();
        $request->session()->flash('message', 'Brand has been successfully saved');
        return redirect('/admin/brands');
    }
    
    public function delete(Request $request)
    {
        Brand::destroy($request->input('id'));
    }
}
