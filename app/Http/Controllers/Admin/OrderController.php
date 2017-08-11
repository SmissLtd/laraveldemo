<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function form(Order $model)
    {
        return view('admin.order.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:32',
            'address' => 'required|max:255',
            'status' => 'required|in:new,cancelled,paid,delivered,received'
        ]);
        $model = Order::find($request->input('id'));
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->phone = $request->input('phone');
        $model->address = $request->input('address');
        $model->message = $request->input('message');
        $model->status = $request->input('status');
        $model->save();
        $request->session()->flash('message', 'Order has been successfully saved');
        return redirect('/admin/orders');
    }
    
    public function delete(Request $request)
    {
        Order::destroy($request->input('id'));
    }
}
