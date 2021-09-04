<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct(){
        $this ->middleware('auth');
    }


    function show(){
        $list = Brand::all(); //select * from brands
        return view('brand/list', ['brands' => $list]);
    }

    function form($id = null){
        $brand = new Brand();
        if($id != null){
            $brand = Brand::findOrFail($id);
        }
        return view('brand/form', ['brand' => $brand]);
    }


    function save(Request $request){

        $request ->validate([
            "name" => 'required|max:50'            
        ]);

       $brand = new Brand();
       if($request -> id > 0){
           $brand =Brand::findOrFail($request -> id);
       }
       $brand -> name = $request ->name;
       

       $brand ->save();

       return redirect('/brands') ->with('message', 'Marca guardada');
    }

    function delete($id){
        //select * from brands where id=$id
        $brand = Brand::findOrFail($id);
        $brand ->delete();

        return redirect('/brands') ->with('message', 'Marca eliminada');
    }

}
