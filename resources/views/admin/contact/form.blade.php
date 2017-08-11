<?php
/**
 * @param App\Contact $model
 */
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li><a href="{{ action('Admin\AdminController@contacts') }}">Contact</a></li>
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
        <form action="{{ action('Admin\ContactController@submit') }}" method="POST">
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
                <label for="input-message" class="control-label">Message</label>
                <textarea class="form-control" id="input-message" name="message" required="required">{{ $model->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="input-status" class="control-label">Status</label>
                <select class="form-control" id="input-status" name="status" required="required">
                    <option value="new"{{ $model->status == 'new' ? ' selected="selected"' : ''}}>New</option>
                    <option value="cancelled"{{ $model->status == 'cancelled' ? ' selected="selected"' : ''}}>Cancelled</option>
                    <option value="replied"{{ $model->status == 'replied' ? ' selected="selected"' : ''}}>Replied</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection