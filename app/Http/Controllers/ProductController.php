<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

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
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('product', 'brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:products', 'max:255'],
            'price' => ['required', 'numeric', 'min:0.1'],
            'description' => ['required', 'string'],
            'image' => ['string'],
            'brand_id' => 'exists:brands,id',
            'cats' => 'exists:categories,id'
        ]);

        $data = $request->all();
        $product = Product::create($data);
        if (array_key_exists('cats', $data)) {
            $product->categories()->attach($data['cats']);
        }
        return redirect()->route('products.show', $product)->with('message', "Prodotto $product->name aggiuto con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        $categories_ids = $product->categories->pluck('id')->toArray();

        return view('products.edit', compact('product', 'brands', 'categories_ids', 'categories'));
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
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['numeric', 'min:0.1', 'max:1000'],
            'image' => ['string'],
            'brand_id' => 'exists:brands,id',
            'cats' => 'exists:categories,id'
        ]);

        $data = $request->all();
        $product->fill($data);
        $product->save();
        if (!array_key_exists('cats', $data)) $product->categories()->detach();
        else $product->categories()->sync($data['cats']);

        return redirect()->route('products.show', $product->id)->with('message', "Prodotto $product->name modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
