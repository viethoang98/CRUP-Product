@extends('product.layout')  <!--Giải thích-->

@section('content') <!--Giải thích-->
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Product</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('product.index') }}" class="btn btn-success">Back</a>
            <!-- route link về file index ban đầu khi edit hoặc add xong -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Name:</strong>
            {{ $data->product_name }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Code:</strong>
            {{ $data->product_code }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Details:</strong>
            {{ $data->details }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Image:</strong>
            <img src="{{ URL::to($data->logo) }}" height="150px;" width="200px;">
        </div>
    </div>
</div>
@endsection