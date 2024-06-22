<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //view product list method
    public function index(){
        return view('products.index');
    }

    //add product method
    public function create(){
        return view('products.create');
    }
}
