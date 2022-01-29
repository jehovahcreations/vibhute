<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Newupdate;


class NewupdateController extends Controller
{
  function index(){

      $menu = Newupdate::get();
      return $menu;
  }
    function dashboard()
    {
        return view('dashboard');
    }
    function table(){
       // return $id;
    $table = Newupdate::get();
    return view('frontend.newupdate.table')->with('table',$table);
    }
    function deactive($id)
    {
        $login = Newupdate::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Newupdate::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.newupdate.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Newupdate::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Newupdate::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.newupdate.table')->with('table', $table);
    }
    function delete($id)
    {
        Newupdate::destroy($id);
        $table = Newupdate::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.newupdate.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Newupdate();
        $user->url = $request['url'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Newupdate::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.newupdate.table')->with('table', $table);
    }
    function edit($id)
    {
        $table =Newupdate::find($id);
        return view('frontend.newupdate.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')){
             $image = base64_encode(file_get_contents($request->file('image')));
             $update = Newupdate::find($request['id']);
             $update->url = $request['url'];
             $update->image = $image;
             $update->save();
         }else{
            $update = Newupdate::find($request['id']);
            $update->url = $request['url'];
            $update->image =$request['img'];
            $update->save();

         }
        $table = Newupdate::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.newupdate.table')->with('table', $table);
    }
}
