@extends('admin/products/layout')

@section('styles')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

@endsection

@section('content')

<h1>Add Product</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product[0]->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com" value="{{ $product[0]->name }}">
        <label for="name">Product Name</label>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="price" name="price" placeholder="Password" min="0.01" step="0.01" max="99999.99" value="{{ $product[0]->price }}">
        <label for="price">Price</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{ $product[0]->quantity }}">
        <label for="quantity">Quantity</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Description about your product" id="description" name="description"  style="height: 100px">{{ $product[0]->description }}</textarea>
        <label for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Product category select" id="cat_id" name="cat_id">
            <option selected disabled value>Select...</option>
            @foreach($prodCat as $category)
                @if($category->id == $product[0]->cat_id)
                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
            @endforeach
        </select>
        <label for="floatingSelect">Category</label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection