<?php
/**
 * @param App\Product $model
 * @param App\Tag[] $tags
 * @param App\Category[] $categories
 * @param App\Brand[] $brands
 */
?>
@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\AdminController@index') }}">Dashboard</a></li>
        <li><a href="{{ action('Admin\AdminController@products') }}">Products</a></li>
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
        <form action="{{ action('Admin\ProductController@submit') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />
            <div class="form-group">
                <label for="input-name" class="control-label">Name</label>
                <input type="text" class="form-control" id="input-name" name="name" value="{{ $model->name }}" required="required" />
            </div>
            <div class="form-group">
                <label for="input-name_long" class="control-label">Long Name</label>
                <textarea class="form-control" id="input-name_long" name="name_long" required="required">{{ $model->name_long }}</textarea>
            </div>
            <div class="form-group">
                <label for="input-description" class="control-label">Description</label>
                <textarea class="form-control" id="input-description" name="description">{{ $model->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="input-price" class="control-label">Price</label>
                <input type="text" class="form-control" id="input-price" name="price" value="{{ $model->price }}" />
            </div>
            <div class="form-group">
                <label for="input-brand" class="control-label">Brand</label>
                <select class="form-control" id="input-brand" name="brand_id" required="required">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"{{ $brand->id == $model->brand_id ? ' selected="selected"' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="form-group">
                        <label for="input-photo" class="control-label">Photo</label>
                        <input type="file" class="form-control" id="input-photo" name="photo" accept="image/*" />
                    </div>
                    @if (!empty($model->photo))
                        <div class="product-photo" style="background-image: url({{ asset('images/' . $model->photo) }})"></div>
                    @endif
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="form-group">
                        <label for="input-photo_big1" class="control-label">1st Big Photo</label>
                        <input type="file" class="form-control" id="input-photo_big1" name="photo_big1" accept="image/*" />
                    </div>
                    @if (!empty($model->photo_big1))
                        <div class="product-photo_big" style="background-image: url({{ asset('images/' . $model->photo_big1) }})">
                            <label>
                                <input type="hidden" name="delete_photo_big1" value="0" />
                                <input type="checkbox" name="delete_photo_big1" value="1" />
                                Delete
                            </label>
                        </div>
                    @endif
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="form-group">
                        <label for="input-photo_big2" class="control-label">2nd Big Photo</label>
                        <input type="file" class="form-control" id="input-photo_big2" name="photo_big2" accept="image/*" />
                    </div>
                    @if (!empty($model->photo_big2))
                        <div class="product-photo_big" style="background-image: url({{ asset('images/' . $model->photo_big2) }})">
                            <label>
                                <input type="hidden" name="delete_photo_big2" value="0" />
                                <input type="checkbox" name="delete_photo_big2" value="1" />
                                Delete
                            </label>
                        </div>
                    @endif
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="form-group">
                        <label for="input-photo_big3" class="control-label">3rd Big Photo</label>
                        <input type="file" class="form-control" id="input-photo_big3" name="photo_big3" accept="image/*" />
                    </div>
                    @if (!empty($model->photo_big3))
                        <div class="product-photo_big" style="background-image: url({{ asset('images/' . $model->photo_big3) }})">
                            <label>
                                <input type="hidden" name="delete_photo_big3" value="0" />
                                <input type="checkbox" name="delete_photo_big3" value="1" />
                                Delete
                            </label>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <h3>Categories</h3>
                    <hr />
                    @foreach ($categories as $category)
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="category[{{ $category->id }}]" value="0" />
                                <input type="checkbox" name="category[{{ $category->id }}]" value="1"{{ $model->categories()->where('category_id', $category->id)->first() ? (' checked="checked"') : ''}} />
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6">
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
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection