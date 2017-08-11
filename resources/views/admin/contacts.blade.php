<?php
/**
 * @param App\Contact[] $models
 */
$message = session('message');
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li class="active">Contacts</li>
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
                    <td>{{ $model->status }}</td>
                    <td>
                        <a href="{{ action('Admin\ContactController@form', ['id' => $model->id]) }}"><i class="fa fa-file-text-o"></i></a>
                        <a href="#" class="delete" data-model="contact"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
@endsection