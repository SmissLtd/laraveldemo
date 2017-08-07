<?php
/**
 * @param App\Brand $model
 */
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li><a href="{{ action('Admin\AdminController@brands') }}">Brands</a></li>
        <li class="active">{{ $model->exists ? 'Edit' : 'Create' }}</li>
    </ol>

    <div class="container">
        <form action="{{ action('Admin\BrandController@submit') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />
            <div class="form-group">
                <label for="input-name" class="control-label">Name</label>
                <input type="text" class="form-control" id="input-name" name="name" value="{{ $model->name }}" required="required" />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection