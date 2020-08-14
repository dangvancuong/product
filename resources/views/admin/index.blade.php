{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Admin')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Control panel')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin') !!}
@endsection

{{-- Header Extras to be Included --}}
@section('head-extras')
    @parent
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $reports->getTotalUsers() }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon smaller">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin::users.index') }}" class="small-box-footer">List Users <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $reports->getTotalProducts() }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon smaller">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin::products.index') }}" class="small-box-footer">List Products <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $reports->getTotalCategories() }}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon smaller">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin::categories.index') }}" class="small-box-footer">List Categories <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
