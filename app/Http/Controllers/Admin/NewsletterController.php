<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function form(Newsletter $model)
    {
        return view('admin.newsletter.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        if ($id = $request->input('id'))
            $model = Newsletter::find($id);
        else
            $model = new Newsletter();
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:newsletters,email' . ($model->exists ? (',' . $model->id) : '')
        ]);
        $model->email = $request->input('email');
        $model->save();
        $request->session()->flash('message', 'Newsletter has been successfully saved');
        return redirect('/admin/newsletters');
    }
    
    public function delete(Request $request)
    {
        Newsletter::destroy($request->input('id'));
    }
}
