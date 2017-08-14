<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function form(User $model)
    {
        return view('admin.user.form', ['model' => $model]);
    }
    
    public function submit(Request $request)
    {
        if ($id = $request->input('id'))
            $model = User::find($id);
        else
            $model = new User();
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email' . ($model->exists ? (',' . $model->id) : ''),
            'is_admin' => 'required|boolean',
            'password' => 'confirmed'
        ];
        if (!$model->exists)
            $rules['password'] = 'required|confirmed';
        $this->validate($request, $rules);
        $model->first_name = $request->input('first_name');
        $model->last_name = $request->input('last_name');
        $model->email = $request->input('email');
        $model->is_admin = $request->input('is_admin');
        if ($request->has('password'))
            $model->password = bcrypt($request->input('password'));
        $model->save();
        $request->session()->flash('message', 'User has been successfully saved');
        return redirect('/admin/users');
    }
    
    public function delete(Request $request)
    {
        if ($request->input('id') != Auth::user()->id)
            User::destroy($request->input('id'));
    }
}
