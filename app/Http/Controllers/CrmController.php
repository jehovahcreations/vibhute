<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Crm;
use App\Models\Mainmenu;


class CrmController extends Controller
{

    function table()
    {
        // return $id;
        $table = Crm::get();
       // $menu = Crm::get();
        return view('frontend.crm.table')->with('table', $table);
    }
    function create()
    {
        $table = Submenu::get();
        return view('frontend.crm.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Crm::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Crm::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.crm.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Crm::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Crm::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.crm.table')->with('table', $table);
    }
    function delete($id)
    {
        Crm::destroy($id);
        $table = Crm::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.crm.table')->with('table', $table);
    }
  
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        $user = new Crm();
        $user->mainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        $user->SubMenu = $request['subMenu'];
        $user->name = $request['name'];
        $user->image = $image;
        $user->is_Active = 1;
        $user->save();
        $table = Crm::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.crm.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Crm::find($id);
        return view('frontend.crm.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Crm::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Crm::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Crm::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.crm.table')->with('table', $table);
    }
}
