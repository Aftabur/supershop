<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
use Session;

class productImageController extends Controller
{
    public function createImageUpload(){
        return view('admin.imagepart.productImage');
    }

    public function storeImageUpload(Request $request){
        $this->validate($request,[
            'productimageTitle'=>'required',
        ]);

        // return $request->all();
        if($file=$request->file('productimageupload')){
            if($file->getSize()>1000000){
                    // return response()->json(['errors'=> ["File size limit exceeded. Max size limit is 10 MB"]]);
            }

            $name=time().".".$file->getClientOriginalExtension();
            $file->move(('attendance_file'),$name);

            $this->validate($request,[
                'productimageTitle'=>'required',
            ]);

            DB::table('productimage')->insert([
                    'productimageupload'=>$name,
                    'productimageTitle'=>$request->productimageTitle,
             
            ]);
        }else{

        }
        Session::flash('message', 'Information has been successfully Added!');
        return view('admin.imagepart.productImage');

        // $this->validate($request,[
        //     'productimageTitle'=>'required',
        //     'productimageupload'=>'required',
            
        // ]);


        // $productimage=$request->file('productimageupload');
        // $productName=$productimage->getClientOriginalName();
        // echo $productName;

        // if(!empty($_FILES['productimageupload']['name'])){

        //     request()->validate([
        //         'productimageTitle'=>'required',
        //         'productimageupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        //     ]);
        //     //uploading file and storing it to database as well 
        //       $picture_tmp = $_FILES['productimageupload']['tmp_name'];
        //       $picture_name = $_FILES['productimageupload']['name'];
        //       $picture_type = $_FILES['productimageupload']['type'];
             
        //       $arr1 = explode(".", $picture_tmp);
        //       $extension1 = strtolower(array_pop($arr1));  
              
        //       $arr = explode(".", $picture_name);
        //       $extension = strtolower(array_pop($arr));
                
        //       $server_ip = gethostbyname(gethostname());

        //       $image="order_verification_"."_".rand(0,999).".".$extension;
        //       $newfilename1="order_verification_"."_".rand(0,999).".".$extension1;
        //       $path = 'receiver_attachment/'.$image;

        //       move_uploaded_file($picture_tmp, $path);

        //       DB::table('productimage')->insert([
        //         "productimageupload"=>$image,
        //         "productimageTitle"=>$request->productimageTitle,
                
        //       ]);

        //       Session::flash('message', 'Information has been successfully Added!');
        //       return view('admin.imagepart.productImage');

        // }



        // if(!empty($_FILES['productimageupload']['name'])){

        //     request()->validate([
        //         'productimageupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        //     ]);
        //     //uploading file and storing it to database as well 
        //       $picture_tmp = $_FILES['productimageupload']['tmp_name'];
        //       $picture_name = $_FILES['productimageupload']['name'];
        //       $picture_type = $_FILES['productimageupload']['type'];
             
        //       $arr1 = explode(".", $picture_tmp);
        //       $extension1 = strtolower(array_pop($arr1));  
              
        //       $arr = explode(".", $picture_name);
        //       $extension = strtolower(array_pop($arr));
                
        //       $server_ip = gethostbyname(gethostname());

        //       $image="order_verification_"."_".rand(0,999).".".$extension;
        //       $newfilename1="order_verification_"."_".rand(0,999).".".$extension1;
        //       $path = 'receiver_attachment/'.$image;

        //       move_uploaded_file($picture_tmp, $path);

        //       DB::table('productimage')->insert([
        //         "productimageupload"=>$image,
        //         "productimageTitle"=>$request->productimageTitle,
                
                
                
        //       ]);
        //     //   return view('admin.imagepart.productImage');
        //     Session::flash('message', 'Information has been successfully Added!');
        //     return view('admin.imagepart.productImage');

        //}
        
    }

    public function manageImageUpload(){
        $showdata=DB::table('productimage')->get();
        return view('admin.imagepart.manageImage',compact('showdata'));
    }

    public function editImageUpload($id){
        $showdata=DB::table('productimage')->where('id','=',$id)->first();
        return view('admin.imagepart.editImage',compact('showdata'));
    }

    
}
