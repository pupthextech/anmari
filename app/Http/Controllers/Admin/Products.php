<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Products\ProductCreateRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')
                ->join('product_categories', 'products.cat_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.category_name')
                ->paginate(5);
        // dd($data);
        // $data = Product::latest()->paginate(5);
    
        return view('admin.products.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodCat = ProductCategory::all();
        return view('admin.products.create', compact('prodCat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/products';
            $productName = $request->name . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productName);
            $input['image'] = "$productName";
        }
        Product::create($input);
        return redirect()->route('products.index')
        ->with('success','Product added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = DB::table('products')
                ->join('product_categories', 'products.cat_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.category_name')
                ->where('products.id', '=', $product->id)
                ->paginate(5);
        // dd($data);
        return view('admin.products.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = DB::table('products')
                ->join('product_categories', 'products.cat_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.category_name')
                ->where('products.id', '=', $product->id)
                ->paginate(5);
        $prodCat = ProductCategory::all();
        return view('admin.products.edit',compact('product', 'prodCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductUpdateRequest $product, $id)
    {
        $data = $request->except(['_token', '_method']);
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/products';
            $productName = $request->name . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productName);
            $data['image'] = "$productName";
        }

        Product::where('id', $id)->update($data);
    
        return redirect()->route('products.index')
        ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product removed successfully');
    }
}
