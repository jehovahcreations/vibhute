<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Menulist;
use App\Models\Goodnight;
use App\Models\Applink;
use Illuminate\Support\Facades\DB;

class GoodnightController extends Controller
{
    function create(){
        return view('frontend.goodnight.create');

    }
  
    function table(){
       // return $id;
    $table = Goodnight::get();
    return view('frontend.goodnight.table')->with('table',$table);
    }
    function deactive($id)
    {
        $login = Goodnight::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Goodnight::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.goodnight.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Goodnight::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Goodnight::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.goodnight.table')->with('table', $table);
    }
    function delete($id)
    {
        Goodnight::destroy($id);
        $table = Goodnight::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.goodnight.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Goodnight();
        $user->name = $request['name'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Goodnight::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.goodnight.table')->with('table', $table);
    }
    function edit($id)
    {
        $table =Goodnight::find($id);
        return view('frontend.goodnight.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')){
             $image = base64_encode(file_get_contents($request->file('image')));
             $update = Goodnight::find($request['id']);
             $update->name = $request['name'];
             $update->decp = $request['decp'];
             $update->image = $image;
             $update->save();
         }else{
            $update = Goodnight::find($request['id']);
            $update->name = $request['name'];
            $update->decp = $request['decp'];
            $update->image =$request['img'];
            $update->save();

         }
        $table = Goodnight::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.goodnight.table')->with('table', $table);
    }
}
