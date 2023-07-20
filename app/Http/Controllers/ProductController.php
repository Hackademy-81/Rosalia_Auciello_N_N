<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all(); 
        $tags= Tag::all(); 
        return view('product/create', compact('categories'), compact('tags')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product= Auth::user()->products()->create(
            [
                'name'=>$request->input('name'),
                'body'=>$request->input('body'),
                'price'=>$request->input('price'),
                'img'=>$request->has('img')? $request->file('img')->store('public/product'): '/img/default.jpg', 
                'category_id'=>$request->input('category_id'), 
            ], 
        ); 

        foreach($request->input('tag_id') as $tag){
            $product->tags()->attach($tag); 
        }

        
        return redirect(route('homePage'))->with('message', 'prodotto aggiunto con successo!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product/show', compact('product')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product/edit', compact('product')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->name= $request->name;
        $product->body= $request->body;
        $product->price= $request->price;
        $product->img= $request->has('img')? $request->file('img')->store('public/product'): $product->img; 
        $product->category_id= $request->category_id; 
        $product->save(); 

        $product->tags()->sync($request->input('tag_id')); 

        return redirect(route('product.show', compact('product')))->with('message', 'prodotto modificato con successo!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete(); 
        return redirect(route('homePage'))->with('message', 'prodotto eliminato con successo!'); 
    }

    public function user(User $user){
        return view('product/user', compact('user')); 
    }

    public function getProductsByCategory(Category $category){
        return view('product/category', compact('category')); 
    }
}
