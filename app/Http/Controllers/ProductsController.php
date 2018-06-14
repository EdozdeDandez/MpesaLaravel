<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth');
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->paginated();
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = auth()->id();
        $product = $this->productRepository->create($input);
        if($product) {
            Session::flash('alert-success', 'Product added!!!');
            return redirect()->route('products.show');
        }
        Session::flash('alert-danger','');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $input = $request->all();
        $input['updated_by'] = auth()->id();
        $response = $this->productRepository->update($input, $product->id);
        if($response) {
            Session::flash('alert-success', 'Product updated!!!');
            return redirect()->route('products.show');
        }
        Session::flash('alert-danger','Could not update record!!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $response = $this->productRepository->delete($product->id);
        if($response) {
            return redirect()->route('products.show');
        }
        Session::flash('alert-danger','Could not delete record!!!');
        return redirect()->back();
    }

    public function getProducts(Request $request)
    {
        $name = $request->get('name');
        return response($this->productRepository->filter($name)->jsonSerialize(), Response::HTTP_OK);
    }
}
