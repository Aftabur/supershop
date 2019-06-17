<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class supershopController extends Controller
{
    public function index(){
        $datalist=DB::table('products')
        ->leftJoin('categories','products.categoryId','=','categories.id')
        ->leftJoin('manufacturers','products.manufacturerId','=','manufacturers.id')

        ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
        
        ->where('products.publicationStatus',1)
        ->where('categories.categoryName','=','Electronics')
        ->get();

        $upcoming=DB::table('products')
        ->leftJoin('categories','products.categoryId','=','categories.id')
        ->leftJoin('manufacturers','products.manufacturerId','=','manufacturers.id')

        ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
        
        ->where('products.publicationStatus',0)
        ->get();
        return view('frontEnd.home.home',compact('datalist','upcoming'));
    }
    public function category(){
        return view('frontEnd.category.categoryContent');
    }
    public function producDetails($id){


        $data=DB::table('products')
        ->leftJoin('categories','products.categoryId','=','categories.id')
        ->leftJoin('manufacturers','products.manufacturerId','=','manufacturers.id')
        ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
        ->where('products.id',$id)
        ->first();
        
        return view('frontEnd.product.productContent',compact('data'));
    }
}
