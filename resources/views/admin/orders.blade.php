<?php
/**
 * @param App\Order[] $models
 */
$message = session('message');
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li class="active">Orders</li>
    </ol>

    @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="column-id">ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Products</th>
                <th>Total</th>
                <th>Status</th>
                <th class="column-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                <tr data-id="{{ $model->id }}">
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->created_at }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->email }}</td>
                    <td>{{ $model->phone }}</td>
                    <td>{{ $model->address }}</td>
                    <td>{{ number_format($model->products()->count(), 0) }}</td>
                    <td>${{ number_format($model->total(), 2) }}</td>
                    <td>{{ $model->status }}</td>
                    <td>
                        <a href="{{ action('Admin\OrderController@form', ['id' => $model->id]) }}"><i class="fa fa-file-text-o"></i></a>
                        <a href="#" class="delete" data-model="order"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
@endsection