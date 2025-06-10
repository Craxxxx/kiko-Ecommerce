<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products—if you want most recent first, append ->latest()
        $products = Product::all();

        // Pass them to the view
        return view('ShirtCategory', compact('products'));
    }
}
