<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function boitier()
    {
    	return view('products.boitier');
    }

     public function sim()
    {
    	return view('products.sim');
    }
}
