<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Menulist;
use App\Models\Goodmorning;
use App\Models\Applink;
use Illuminate\Support\Facades\DB;

class GoodmorningController extends Controller
{
    function create(){
        return view('frontend.goodmorning.create');

    }
  
    function table(){
       // return $id;
    $table = Goodmorning::get();
    return view('frontend.goodmorning.table')->with('table',$table);
    }
    function deactive($id)
    {
        $login = Goodmorning::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Goodmorning::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.goodmorning.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Goodmorning::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Goodmorning::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.goodmorning.table')->with('table', $table);
    }
    function delete($id)
    {
        Goodmorning::destroy($id);
        $table = Goodmorning::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.goodmorning.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Goodmorning();
        $user->name = $request['name'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Goodmorning::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.goodmorning.table')->with('table', $table);
    }
    function edit($id)
    {
        $table =Goodmorning::find($id);
        return view('frontend.goodmorning.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')){
             $image = base64_encode(file_get_contents($request->file('image')));
             $update = Goodmorning::find($request['id']);
             $update->name = $request['name'];
             $update->decp = $request['decp'];
             $update->image = $image;
             $update->save();
         }else{
            $update = Goodmorning::find($request['id']);
            $update->name = $request['name'];
            $update->decp = $request['decp'];
            $update->image =$request['img'];
            $update->save();

         }
        $table = Goodmorning::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.goodmorning.table')->with('table', $table);
    }
}
