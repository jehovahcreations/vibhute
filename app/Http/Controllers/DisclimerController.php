<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Disclimer;


class DisclimerController extends Controller
{
  function index(){

      $menu = Disclimer::get();
      return $menu;
  }
    function dashboard()
    {
        return view('dashboard');
    }
    function table(){
       // return $id;
    $table = Disclimer::get();
    return view('frontend.disclimer.table')->with('table',$table);
    }
    function deactive($id)
    {
        $login = Disclimer::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Disclimer::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.disclimer.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Disclimer::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Disclimer::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.disclimer.table')->with('table', $table);
    }
    function delete($id)
    {
        Disclimer::destroy($id);
        $table = Disclimer::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.disclimer.table')->with('table', $table);
    }
    function addDisclimer(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Disclimer();
        $user->name = $request['name'];
        $user->desc = $request['desc'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Disclimer::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.disclimer.table')->with('table', $table);
    }
    function edit($id)
    {
        $table =Disclimer::find($id);
        return view('frontend.disclimer.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')){
             $image = base64_encode(file_get_contents($request->file('image')));
             $update = Disclimer::find($request['id']);
             $update->name = $request['name'];
             $update->desc = $request['desc'];
             $update->image = $image;
             $update->save();
         }else{
            $update = Disclimer::find($request['id']);
            $update->name = $request['name'];
            $update->desc = $request['desc'];
            $update->image =$request['img'];
            $update->save();

         }
        $table = Disclimer::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.disclimer.table')->with('table', $table);
    }
}
