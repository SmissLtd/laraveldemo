<?php
/**
 * @param integer $brands
 * @param integer $tags
 * @param integer $categories
 * @param integer $products
 * @param integer $orders
 * @param integer $newOrders
 * @param integer $contacts
 * @param integer $newContacts
 * @param integer $newsletters
 * @param integer $users
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="dashboard">
        <div>
            <a href="{{ action('Admin\AdminController@brands') }}" title="Brands">
                <i class="fa fa-internet-explorer"></i>
                <span class="badge">{{ $brands }}</span>
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@tags') }}" title="Tags">
                <i class="fa fa-tags"></i>
                <span class="badge">{{ $tags }}</span>
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@categories') }}" title="Categories">
                <i class="fa fa-folder-open"></i>
                <span class="badge">{{ $categories }}</span>
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@products') }}" title="Products">
                <i class="fa fa-database"></i>
                <span class="badge">{{ $products }}</span>
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@orders') }}" title="Orders">
                <i class="fa fa-briefcase"></i>
                <span class="badge">{{ $orders }}</span>
                @if ($newOrders > 0)
                    <span class="badge new">{{ $newOrders }}</span>
                @endif
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@contacts') }}" title="Contacts">
                <i class="fa fa-comment-o"></i>
                <span class="badge">{{ $contacts }}</span>
                @if ($newContacts > 0)
                    <span class="badge new">{{ $newContacts }}</span>
                @endif
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@newsletters') }}" title="Newsletters">
                <i class="fa fa-newspaper-o"></i>
                <span class="badge">{{ $newsletters }}</span>
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@users') }}" title="Users">
                <i class="fa fa-users"></i>
                <span class="badge">{{ $users }}</span>
            </a>
        </div>
        <div>
            <a href="{{ action('Admin\AdminController@settings') }}" title="Settings">
                <i class="fa fa-cogs"></i>
            </a>
        </div>
    </div>
@endsection