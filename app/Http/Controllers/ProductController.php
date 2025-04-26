<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Fetch all products from the database
    public function index(){
        $products = Product::all();
        return $products;

    }


    // Fetch a single product by its ID
    public function show($id){
        $product = Product::where('id', $id)->first();
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return $product;
    }



    // Create and Store the new product in the database
    public function store(Request $request){
        
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
        
    }


    // Update an existing product in the database
    public function update(Request $request, $id){
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();

        return response()->json(['message' => 'Product updated successfully', 'data' => $product], 200);
    }


    // Delete a product from the database
    public function destroy($id){
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

}