<?php
/**
 * @param App\Category $model
 * @param App\Tag[] $tags
 */
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li><a href="{{ action('Admin\AdminController@categories') }}">Categories</a></li>
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
        <form action="{{ action('Admin\CategoryController@submit') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />
            <div class="form-group">
                <label for="input-name" class="control-label">Name</label>
                <input type="text" class="form-control" id="input-name" name="name" value="{{ $model->name }}" required="required" />
            </div>
            <div class="checkbox">
                <label>
                    <input type="hidden" name="is_special" value="0" />
                    <input type="checkbox" name="is_special" value="1"{{ $model->is_special ? (' checked="checked"') : ''}} />
                    Special
                </label>
            </div>
            <div class="form-group">
                <label for="input-discount" class="control-label">Discount(%), for special category only</label>
                <input type="text" class="form-control" id="input-discount" name="discount" value="{{ $model->discount }}" />
            </div>
            <div class="form-group">
                <label for="input-photo" class="control-label">Photo{{ $model->photo ? ('(' . $model->photo . ')') : '' }}</label>
                <input type="file" class="form-control" id="input-photo" name="photo" required="required" accept="image/*" />
            </div>
            <div class="form-group">
                <label for="input-photo_big" class="control-label">Big Photo(for promoted category on home page){{ $model->photo_big ? ('(' . $model->photo_big . ')') : '' }}</label>
                <input type="file" class="form-control" id="input-photo_big" name="photo_big" accept="image/*" />
            </div>

            <h3>Tags</h3>
            <hr />
            @foreach ($tags as $tag)
                <div class="checkbox">
                    <label>
                        <input type="hidden" name="tag[{{ $tag->id }}]" value="0" />
                        <input type="checkbox" name="tag[{{ $tag->id }}]" value="1"{{ $model->tags()->where('tag_id', $tag->id)->first() ? (' checked="checked"') : ''}} />
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection