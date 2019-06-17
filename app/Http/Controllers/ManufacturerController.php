<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;
use Session;

class ManufacturerController extends Controller
{
    public function createmanufacturer(){
        return view('admin.manufacturer.createmanufacturer');
    }

    public function saveManufacturer(Request $request){
        // return $request->all();
        $this->validate($request,[
            'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
            // 'publicationStatus'=>'required',
        ]);
        $saveData=DB::table('manufacturers')->insert([
            "manufacturerName"=>$request->manufacturerName,
            "manufacturerDescription"=>$request->manufacturerDescription,
            "publicationStatus"=>$request->publicationStatus,
        ]);
        Session::flash('message', 'Information has been successfully Added!');
        return redirect()->back();
    }

    public function manageManufacturer(){
        $manageData=DB::table('manufacturers')->get();

        return view('admin.manufacturer.managemanufacturer',compact('manageData'));
    }

    public function editManufacturer($id){
        $editdata=DB::table('manufacturers')->where('id','=',$id)->first();
        return view('admin.manufacturer.editmanufacturer',compact('editdata'));
    }
    // public function editmanufacturer($id){
    //     $editdata=manufacturer::where('id',$id)->first();
    //     return view('admin.manufacturer.editmanufacturer',['editdata',$editdata]);
    // }

    public function updateManufacturer(Request $request){
        $this->validate($request,[
            'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
            // 'publicationStatus'=>'required',
        ]);
        $saveData=DB::table('manufacturers')->where('id',$request->id)->update([
            "manufacturerName"=>$request->manufacturerName,
            "manufacturerDescription"=>$request->manufacturerDescription,
            "publicationStatus"=>$request->publicationStatus,
        ]);
        // var_dump($saveData);
        Session::flash('message', 'Information has been successfully Updated!');
        return redirect()->route('admin.manufacturer.managemanufacturer');
    }

    public function deleteManufacturer($id){
        $deletedata=DB::table('manufacturers')->where('id','=',$id)->delete();
        Session::flash('message', 'Information has been successfully Deleted!');
        return redirect()->back();
    }
}
