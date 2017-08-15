<?php
/**
 * @param App\Category[] $categories
 */

use App\Config;

$offeredCategoryId = Config::getValue(Config::INDEX_OFFERS_CATEGORY);
$offeredProductsCategoryId = Config::getValue(Config::INDEX_PRODUCTS_CATEGORY);
$message = session('message');
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li class="active">Settings</li>
    </ol>

    @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

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
        <form action="{{ action('Admin\AdminController@submitSettings') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="input-address" class="control-label">Address</label>
                <input type="text" class="form-control" id="input-address" name="address" value="{{ Config::getValue('address') }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-email" class="control-label">E-Mail</label>
                <input type="email" class="form-control" id="input-email" name="email" value="{{ Config::getValue('email') }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-phone_full" class="control-label">Full Phone</label>
                <input type="text" class="form-control" id="input-fhone_full" name="phone_full" value="{{ Config::getValue('phone_full') }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-phone_short" class="control-label">Short Phone</label>
                <input type="text" class="form-control" id="input-phone_short" name="phone_short" value="{{ Config::getValue('phone_short') }}" required="required" />
            </div>
            
            <div class="form-group">
                <label for="input-index_offers_category" class="control-label">Offered Category(on home page)</label>
                <select class="form-control" id="input-index_offers_category" name="index_offers_category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{ $category->id == $offeredCategoryId ? ' selected="selected"' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="input-index_products_category" class="control-label">Offered Products Category(on home page)</label>
                <select class="form-control" id="input-index_products_category" name="index_products_category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{ $category->id == $offeredProductsCategoryId ? ' selected="selected"' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection