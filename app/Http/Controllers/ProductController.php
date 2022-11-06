<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Language;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Providers\RouteServiceProvider;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $codes = Language::pluck('code')->toArray();
        return view('productview.index', ['products' => $products,'codes' => $codes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codes = Language::pluck('code')->toArray();
        return view('productview.create', ['codes' => $codes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:4',
            'description' => 'required|text',
        ]);
        dd($validated);
        $consult  = \DB::table('products')->where('title', strtolower($request->code))->count();
        if ($consult == 0) {
            $language = Language::firstOrNew(
                ['code' => strtolower($request->code), 'english_name' => $request->english_name, 'directionality' => $request->directionality],
                ['local_name' => $request->local_name, 'url_wiki' => $request->url_wiki]
            );
            $language->save();

            return redirect(route('language.index'))->with('success', __('messages.new_product_created'));
        } else {
            return redirect(RouteServiceProvider::LANGUAGE)->with('error', __('messages.code_already_registered'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
