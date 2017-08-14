<?php
/**
 * @param App\User[] $models
 */
$message = session('message');
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li class="active">Users</li>
    </ol>

    @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ action('Admin\UserController@form') }}" class="btn btn-primary">
                Create New User
            </a>
        </div>
    </div>
    <br />

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="column-id">ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Admin</th>
                <th class="column-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                <tr data-id="{{ $model->id }}">
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->first_name }}</td>
                    <td>{{ $model->last_name }}</td>
                    <td>{{ $model->email }}</td>
                    <td>{{ $model->is_admin ? 'Yes' : '' }}</td>
                    <td>
                        <a href="{{ action('Admin\UserController@form', ['id' => $model->id]) }}"><i class="fa fa-file-text-o"></i></a>
                        @if ($model->id != Auth::user()->id)
                            <a href="#" class="delete" data-model="user"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
@endsection