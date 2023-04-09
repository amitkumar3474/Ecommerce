<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use DataTables;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('categories', function($row){
                    $cat = "";
                    foreach($row->categories as $_cat){
                        $cat .= $_cat->name." | <br>";
                    }
                    return $cat;
                })
                ->addColumn('product_image', function($row){
                        $pimage = $row->getFirstMediaUrl('product_image');
                        return '<img src='.$pimage.'  width="50"/>'; 
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('product.edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('product.destroy',$row->id).'"  method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <input class="delete btn btn-danger btn-sm" type="submit" value="Delete">
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'categories','product_image'])
                ->make(true);
        }
        return view('product.index');   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $request->validate([
            'status'             => 'required',
            'name'               => 'required',
            'sku'                => 'required',
            'price'              => 'required',
            'special_price'      => 'required',
            'special_price_from' => 'required',
            'special_price_to'   => 'required|after_or_equal:special_price_from',
            'category'           => 'required',
            'short_description'  => 'required',
            'description'        => 'required',
            'url_key'            => 'required|unique:products',
            'qty'                => 'required',
            'stock_status'       =>  'required'
        ]);

        $productData = $request->all();
        $categoryId = $productData['category'];
        
        $productData['category'] = implode("|", $productData['category']);
        $data = [
            'status'             => $productData['status'],
            'name'               => $productData['name'],
            'sku'                => $productData['sku'],
            'price'              => $productData['price'],
            'special_price'      => $productData['special_price'],
            'special_price_from' => $productData['special_price_from'],
            'special_price_to'   => $productData['special_price_to'],
            'category'           => $productData['category'],
            'short_description'  => $productData['short_description'],
            'description'        => $productData['description'],
            'url_key'            => $productData['url_key'],
            'qty'                => $productData['qty'],
            'stock_status'       => $productData['stock_status'],
        ];
        $product = Product::create($data);
        if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
            $product->addMediaFromRequest('product_image')->toMediaCollection('product_image');
        }

        $product->categories()->sync($categoryId);
        // $productId = $product->id;
        // foreach($categoryId as $_catId ){
        //     ProductCategory::insert(['product_id'=> $productId, 'category_id'=> $_catId]);
        // }
        return redirect()->route('product.index')->with('success', "Product created successfully...");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $category = Category::all();
        $product = Product::where('id', $id)->first();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // echo "<pre>";
        // print_r($product->all());
        // die;
        $request->validate([
            'status'             => 'required',
            'name'               => 'required',
            'sku'                => 'required',
            'price'              => 'required',
            'special_price'      => 'required',
            'special_price_from' => 'required',
            'special_price_to'   => 'required|after_or_equal:special_price_from',
            'category'           => 'required',
            'short_description'  => 'required',
            'description'        => 'required',
            'url_key'            => 'required|unique:products,url_key,' .$product->id,
            'qty'                => 'required',
            'stock_status'       => 'required'
        ]);
        $productData = $request->only('status','name','sku','price','special_price','special_price_from','special_price_to','category','short_description','description','url_key','qty','stock_status');

        $categoryId = $productData['category'];
        $productData['category'] = implode("|", $productData['category']);
        
        Product::where('id', $product->id)->update($productData);
        if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
            $product->clearMediaCollection('product_image');
            $product->addMediaFromRequest('product_image')->toMediaCollection('product_image');
        }

        // echo "<pre>";
        // print_r($categoryId);
        // die;

        $product->categories()->sync($categoryId);
        // $productId = $product->id;
        // ProductCategory::where('product_id', $productId)->delete();
        // foreach($categoryId as $_catId ){
        //     ProductCategory::insert(['product_id'=> $productId, 'category_id'=> $_catId]);
        // }
        return redirect()->route('product.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        ProductCategory::where('product_id', $id)->delete();
        Product::Where('id', $id)->delete();
        return redirect()->route('product.index')->withSuccess('Record deleted successfully....');
    }
}
