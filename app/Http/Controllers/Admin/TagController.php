<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    public function form(Tag $model)
    {
        return view('admin.tag.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:128'
        ]);
        if ($id = $request->input('id'))
            $model = Tag::find($id);
        else
            $model = new Tag();
        $model->name = $request->input('name');
        $model->save();
        $request->session()->flash('message', 'Tag has been successfully saved');
        return redirect('/admin/tags');
    }
    
    public function delete(Request $request)
    {
        Tag::destroy($request->input('id'));
    }
}
