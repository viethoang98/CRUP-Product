@extends('product.layout')  <!--Giải thích-->

@section('content') <!--Giải thích-->
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('product.index') }}" class="btn btn-success">Back</a>
            <!-- route link về file index ban đầu khi edit hoặc add xong -->
        </div>
    </div>
</div>

<form action="{{ url('update/product'.$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf <!--Cần được giải thihcs phần csrf và update-->    

<div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{$product->product_name}}">
                <!--Cần được giải thích thêm-->
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Code:</strong>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{$product->product_code}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                <textarea name="details" class="form-control" placeholder="Details" style="height:100px" >{{$product->details}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Old Image:</strong>
                <input type="file" name="logo">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Old Image:</strong>
                <img src="{{ URL::to($product->logo) }}" height="70px;" width="80px;"> <!--cần giải thích Vì sao dùng product mà ko dùng pro như file create -->
                <input type="hidden" name="old_logo" value="{{ URL::to($product->logo) }}"><!--cần giải thích thêm-->
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection