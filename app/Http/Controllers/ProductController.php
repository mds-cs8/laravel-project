<?php

namespace App\Http\Controllers;

use App\Models\Prodect;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show all products
        return Prodect::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:10|string',
            'url' => 'required',
            "price" => 'required|integer'
        ]);
        Prodect::create([
            'name' => $request->name,
            'url' => $request->url,
            'price' => $request->price
        ]);
        return Prodect::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Prodect::find($id);
        if (!empty($product)) {
            return $product;
        } else {
            return "not found";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Prodect::find($id);
        $product->update($request->all());
        return $product->price;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Prodect::destroy($id);
    }

    public function search(string $name)
    {
        //
        $product = Prodect::where('name', $name)->get();
        if (sizeof($product)) {

            return Prodect::all();
        } else {
            return "not found";
        }
    }
}
