@extends('product.layout')

@section('content')

<br>
<div class="row">
    

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product LeGroup</h2>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark">
            <form class="form-inline" action="/search">
                <a href="{{ route('create.product') }}" class="btn btn-success">Add Product</a>
              <input class="form-control ml-sm-4" type="text" placeholder="Search">
              <button class="btn btn-success" type="submit">Search</button>
              
            </form>
          </nav>
        <div class="pull-right">
            
            <!-- route như là 1 đường dẫn dẫn đến các file khác -->
        </div>
    </div>
    
</div> 
    <!-- Cần giải thích -->
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>

    @endif

    <table class="table table-bordered">
        <tr>
            
            <th with="150px">Product Name</th>
            <th with="150px">Product Code</th>
            <th with="200px">Details</th>
            <th with="100px">Product Logo</th>
            <th with="280px">Action</th>
        </tr>

           
        @foreach($product as $pro)
        <tr>
        
            <td>{{ $pro->product_name }}</td>
            <td>{{ $pro->product_code }}</td>
            <td>{{ str_limit($pro->details,$limit = 70) }}</td>  <!--pro $limit cho phép hiển thị bao nhiêu kí tự-->
            <td><img src="{{ URL::to($pro->logo) }}" height="70px;" width="80px;"></td> <!--Cần giải thích thêm chỗ này vì hiểu chưa kĩ-->
            <td>
                <a href="{{ URL::to('show/product/'.$pro->id) }}" class="btn btn-info">Show</a>
                <a href="{{ URL::to('edit/product/'.$pro->id) }}" class="btn btn-primary">Edit</a><!--Sửa theo id-->
                <a href="{{ URL::to('delete/product/'.$pro->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-danger">Delete</a>
            </td>
        
        </tr>
        @endforeach
    </table>

    {!! $product->links() !!}  <!--Tại sao cho cái này vào lại hiển thị số phân trang-->



@endsection