<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
use Session;

class ProductController extends Controller
{
    public function createProduct(){
        $categories=DB::table('categories')->where('publicationStatus',1)->get();
        $manufacturers=DB::table('manufacturers')->where('publicationStatus',1)->get();


        return view('admin.product.createProduct',compact('categories','manufacturers','catrgory_list'));
    }

    public function storeProduct(Request $request){

        $this->validate($request,[
            'productName'=>'required',
            'categoryId'=>'required',
            'manufacturerId'=>'required',
            'productPrice'=>'required',
            'productQuantity'=>'required',
            'productShortDescription'=>'required',
            'productLongDescription'=>'required',

            'publicationStatus'=>'required',
        ]);


        if($file=$request->file('productImage')){
            if($file->getSize()>1000000){
                    return response()->json(['errors'=> ["File size limit exceeded. Max size limit is 10 MB"]]);
            }

            $name=time().".".$file->getClientOriginalExtension();
            $file->move(('attendance_file'),$name);

            DB::table('products')->insert([
                    'productImage'=>$name,
                    "productName"=>$request->productName,
                    "categoryId"=>$request->categoryId,
                    "manufacturerId"=>$request->manufacturerId,
                    "productPrice"=>$request->productPrice,
                    "productQuantity"=>$request->productQuantity,
                    "productShortDescription"=>$request->productShortDescription,
                    "productLongDescription"=>$request->productLongDescription,
                    "publicationStatus"=>$request->publicationStatus,
            ]);

        }
        Session::flash('message', 'Information has been successfully Added!');
        return redirect()->back();
    }

    public function manageProduct(){
        // $showdata=DB::table('products')->get();
        $showdata = DB::table('products')
        ->leftJoin('categories','products.categoryId','=','categories.id')
        ->leftJoin('manufacturers','products.manufacturerId','=','manufacturers.id')

        ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
        ->get();
        // var_dump( $catrgory_list);


        return view('admin.product.manageProduct',compact('showdata'));
    }
    public function editProduct($id){
        $selectData=DB::table('products')->where('id','=',$id)->first();

        $categories=DB::table('categories')->where('publicationStatus',1)->get();
        $manufacturers=DB::table('manufacturers')->where('publicationStatus',1)->get();

        return view('admin.product.editProduct',compact('selectData','categories','manufacturers'));
    }

    public function updateProduct(Request $request){

        if($request->hasFile('productImage')){


            if($file=$request->file('productImage')){
                if($file->getSize()>1000000){
                        return response()->json(['errors'=> ["File size limit exceeded. Max size limit is 10 MB"]]);
                }

                $name=time().".".$file->getClientOriginalExtension();
                $file->move(('attendance_file'),$name);

                DB::table('products')->where('id',$request->id)->update([
                        'productImage'=>$name,
                        "productName"=>$request->productName,
                        "categoryId"=>$request->categoryId,
                        "manufacturerId"=>$request->manufacturerId,
                        "productPrice"=>$request->productPrice,
                        "productQuantity"=>$request->productQuantity,
                        "productShortDescription"=>$request->productShortDescription,
                        "productLongDescription"=>$request->productLongDescription,
                        "publicationStatus"=>$request->publicationStatus,
                ]);

            }
            Session::flash('message', 'Information has been successfully Updated with Image!');
            return redirect()->route('admin.product.manageProduct');
        }else{
            DB::table('products')->where('id',$request->id)->update([

                "productName"=>$request->productName,
                "categoryId"=>$request->categoryId,
                "manufacturerId"=>$request->manufacturerId,
                "productPrice"=>$request->productPrice,
                "productQuantity"=>$request->productQuantity,
                "productShortDescription"=>$request->productShortDescription,
                "productLongDescription"=>$request->productLongDescription,
                "publicationStatus"=>$request->publicationStatus,
            ]);
            Session::flash('message', 'Information has been successfully Updated without Image!');
            return redirect()->route('admin.product.manageProduct');
        }


    }

    public function deleteProduct($id){
        $deletedata=DB::table('products')->where('id','=',$id)->delete();
        Session::flash('message', 'Information has been successfully Deleted!');
        return redirect()->back();
    }

    public function viewProduct($id){
        $viewdata=DB::table('products')
        ->leftJoin('categories','products.categoryId','=','categories.id')
        ->leftJoin('manufacturers','products.manufacturerId','=','manufacturers.id')

        ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
        ->where('products.id',$id)
        ->first();

        return view('admin.product.viewProduct',compact('viewdata'));
    }
}
