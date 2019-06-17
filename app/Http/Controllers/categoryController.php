<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Session;


class categoryController extends Controller
{
    public function createCategory(){
        return view('admin.category.createCategory');
    }

    public function saveCategory(Request $request){
        // return $request->all();
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
            // 'publicationStatus'=>'required',
        ]);
        $saveData=DB::table('categories')->insert([
            "categoryName"=>$request->categoryName,
            "categoryDescription"=>$request->categoryDescription,
            "publicationStatus"=>$request->publicationStatus,
        ]);
        Session::flash('message', 'Information has been successfully Added!');
        return redirect()->back();
    }

    public function manageCategory(){
        $manageData=DB::table('categories')->get();

        return view('admin.category.manageCategory',compact('manageData'));
    }

    public function editCategory($id){
        $editdata=DB::table('categories')->where('id','=',$id)->first();
        return view('admin.category.editCategory',compact('editdata'));
    }
    // public function editCategory($id){
    //     $editdata=Category::where('id',$id)->first();
    //     return view('admin.category.editCategory',['editdata',$editdata]);
    // }

    public function updateCategory(Request $request){
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
            // 'publicationStatus'=>'required',
        ]);
        $saveData=DB::table('categories')->where('id',$request->id)->update([
            "categoryName"=>$request->categoryName,
            "categoryDescription"=>$request->categoryDescription,
            "publicationStatus"=>$request->publicationStatus,
        ]);
        Session::flash('message', 'Information has been successfully Updated!');
        return redirect()->route('admin.category.manageCategory');
    }

    public function deleteCategory($id){
        $deletedata=DB::table('categories')->where('id','=',$id)->delete();
        Session::flash('message', 'Information has been successfully Deleted!');
        return redirect()->back();
    }
}
