@extends('admin/products/layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); }}"/>
@section('styles')

@section('content')

<h1>Products</h1>
<a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-striped">
  <thead>
    <tr>
        <th width="5%">#</th>
        <th width="14.28%">Name</th>
        <th width="14.28%">Category</th>
        <th width="14.28%">Price</th>
        <th width="14.28%">Quantity</th>
        <th width="26.56%">Description</th>
        <th width="11.28%">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $products)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $products->name }}</td>
        <td>{{ $products->category_name }}</td>
        <td>{{ $products->price }}</td>
        <td>{{ $products->quantity }} pc/s.</td>
        <td>{{ \Str::limit($products->description, 100) }}</td>
        <td>
            <form action="{{ route('products.destroy',$products->id) }}" method="POST">   
                <a class="btn btn-info" href="{{ route('products.show',$products->id) }}">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>    
                <a class="btn btn-primary" href="{{ route('products.edit',$products->id) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>   
                @csrf
                @method('DELETE')      
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $data->links() !!} 

@endsection