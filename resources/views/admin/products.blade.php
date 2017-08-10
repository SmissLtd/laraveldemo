<?php
/**
 * @param App\Product[] $models
 */
$message = session('message');
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li class="active">Products</li>
    </ol>

    @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ action('Admin\ProductController@form') }}" class="btn btn-primary">
                Create New Product
            </a>
        </div>
    </div>
    <br />

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="column-id">ID</th>
                <th>Name</th>
                <th>Long Name</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Sold</th>
                <th>Categories</th>
                <th>Tags</th>
                <th class="column-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                <tr data-id="{{ $model->id }}">
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->name_long }}</td>
                    <td>{{ number_format($model->price, 2) }}</td>
                    <td>{{ $model->brand->name }}</td>
                    <td>{{ number_format($model->sold, 0) }}</td>
                    <td>{{ number_format($model->categories()->count(), 0) }}</td>
                    <td>{{ number_format($model->tags()->count(), 0) }}</td>
                    <td>
                        <a href="{{ action('Admin\ProductController@form', ['id' => $model->id]) }}"><i class="fa fa-file-text-o"></i></a>
                        <a href="#" class="delete" data-model="product"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
@endsection