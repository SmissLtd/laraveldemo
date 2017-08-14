<?php
/**
 * @param App\User $model
 */
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li><a href="{{ action('Admin\AdminController@users') }}">Users</a></li>
        <li class="active">{{ $model->exists ? 'Edit' : 'Create' }}</li>
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
        <form action="{{ action('Admin\UserController@submit') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />
            <div class="form-group">
                <label for="input-first_name" class="control-label">First Name</label>
                <input type="text" class="form-control" id="input-first_name" name="first_name" value="{{ $model->first_name }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-last_name" class="control-label">Last Name</label>
                <input type="text" class="form-control" id="input-last_name" name="last_name" value="{{ $model->last_name }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-email" class="control-label">E-Mail</label>
                <input type="text" class="form-control" id="input-email" name="email" value="{{ $model->email }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-password" class="control-label">Password</label>
                <input type="password" class="form-control" id="input-password" name="password" />
            </div>
            <div class="form-group">
                <label for="input-password_confirmation" class="control-label">Confirm Password</label>
                <input type="password" class="form-control" id="input-password_confirmation" name="password_confirmation" />
            </div>
            <div class="checkbox">
                <label>
                    <input type="hidden" name="is_admin" value="0" />
                    <input type="checkbox" name="is_admin" value="1"{{ $model->is_admin ? (' checked="checked"') : ''}} />
                    Admin
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection