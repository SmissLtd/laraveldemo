<?php
/**
 * @param App\Order $model
 */
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li><a href="{{ action('Admin\AdminController@orders') }}">Orders</a></li>
        <li class="active">Edit</li>
    </ol>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <form action="{{ action('Admin\OrderController@submit') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />
            <div class="form-group">
                <label for="input-name" class="control-label">Name</label>
                <input type="text" class="form-control" id="input-name" name="name" value="{{ $model->name }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-email" class="control-label">E-Mail</label>
                <input type="email" class="form-control" id="input-email" name="email" value="{{ $model->email }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-phone" class="control-label">Phone</label>
                <input type="text" class="form-control" id="input-phone" name="phone" value="{{ $model->phone }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-address" class="control-label">Address</label>
                <input type="text" class="form-control" id="input-address" name="address" value="{{ $model->address }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-message" class="control-label">Message</label>
                <textarea class="form-control" id="input-message" name="message">{{ $model->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="input-status" class="control-label">Status</label>
                <select class="form-control" id="input-status" name="status" required="required">
                    <option value="new"{{ $model->status == 'new' ? ' selected="selected"' : ''}}>New</option>
                    <option value="cancelled"{{ $model->status == 'cancelled' ? ' selected="selected"' : ''}}>Cancelled</option>
                    <option value="paid"{{ $model->status == 'paid' ? ' selected="selected"' : ''}}>Paid</option>
                    <option value="delivered"{{ $model->status == 'delivered' ? ' selected="selected"' : ''}}>Delivered</option>
                    <option value="received"{{ $model->status == 'received' ? ' selected="selected"' : ''}}>Received</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            
            <h3>Products</h3>
            <hr />
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>		
                        <th>Prices</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($model->products as $orderProduct)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $orderProduct->product->photo) }}" height="60px" />
                                <div style="display: inline-block;">
                                    <strong>{{ $orderProduct->product->name_long }}</strong>
                                    <br />
                                    <small>{{ $orderProduct->product->description }}</small>
                                </div>
                            </td>
                            <td class="check">{{ $orderProduct->count }}</td>		
                            <td>${{ number_format($orderProduct->price, 2) }}</td>
                            <td>${{ number_format($orderProduct->price * $orderProduct->count, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><b>Total:</b></td>
                        <td>{{ number_format($model->totalProductCount(), 0) }}</td>
                        <td colspan="2" class="text-center"><b>${{ number_format($model->total(), 2) }}</b></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
@endsection