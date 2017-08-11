<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function form(Contact $model)
    {
        return view('admin.contact.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:32',
            'message' => 'required',
            'status' => 'required|in:new,cancelled,replied'
        ]);
        $model = Contact::find($request->input('id'));
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->phone = $request->input('phone');
        $model->message = $request->input('message');
        $model->status = $request->input('status');
        $model->save();
        $request->session()->flash('message', 'Contact has been successfully saved');
        return redirect('/admin/contacts');
    }
    
    public function delete(Request $request)
    {
        Contact::destroy($request->input('id'));
    }
}
