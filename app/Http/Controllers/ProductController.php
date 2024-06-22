<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //view product list method
    public function index(){
        $products = Product::all();

        return view('products.index',['products' => $products]);
    }

    //create product method
    public function create(){
        return view('products.create');
    }

    //handle form submission
    public function store(Request $reqest){

        //validate the form data
        $data = $reqest->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        //insert data into the database
        $newProduct = Product::create($data);

        //redirect into the index page
        return redirect(route('product.index'));
    }

    //view product in edit form  using this function
    public function edit(Product $product){
        return view('products.edit',['product' => $product]);
    }

    //update the product data using this function
    public function update(Product $product, Request $reqest){
       
        //validate the form data again before update
        $data = $reqest->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);        

        //call update method
        $product->update($data);
        
        //redirecting
        return redirect(route('product.index'))->with('success','product updated successfully..!');
    }

    //Delete the record of the product
    public function delete(Product $product){
        $product->delete();

        //redirecting
        return redirect(route('product.index'))->with('success','product Deleted successfully..!');
    }
}
