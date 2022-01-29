<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Mainmenu;


class SubmenuController extends Controller
{

    function table()
    {
        // return $id;
        $table = Submenu::get();
        return view('frontend.submenu.table')->with('table', $table);
    }
    function create()
    {
    $table = Mainmenu::get();
    return view('frontend.submenu.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Submenu::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Submenu::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.submenu.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Submenu::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Submenu::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.submenu.table')->with('table', $table);
    }
    function delete($id)
    {
        Submenu::destroy($id);
        $table = Submenu::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.submenu.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
    //{{-- "mainMenu","mainMenuNo","subMenu","subMenuNo","is_Active","icon", --}}
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        //return $mainmenu;
        $user = new Submenu();
        $user->mainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        $user->icon = $request['icon'];
        $user->subMenu = $request['subMenu'];
        $user->is_Active = 1;
        $user->save();
        $table = Submenu::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.submenu.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Submenu::find($id);
        return view('frontend.submenu.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Submenu::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Submenu::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Submenu::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.submenu.table')->with('table', $table);
    }
}
