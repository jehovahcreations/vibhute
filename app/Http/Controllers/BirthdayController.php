<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Birthday;
use App\Models\Mainmenu;


class BirthdayController extends Controller
{

    function table()
    {
        // return $id;
        $table = Birthday::get();
        // $menu = Birthday::get();
        return view('frontend.birthday.table')->with('table', $table);
    }
    function create()
    {
        $table = Submenu::get();
        return view('frontend.birthday.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Birthday::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Birthday::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.birthday.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Birthday::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Birthday::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.birthday.table')->with('table', $table);
    }
    function delete($id)
    {
        Birthday::destroy($id);
        $table = Birthday::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.birthday.table')->with('table', $table);
    }

    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        $user = new Birthday();
        $user->mainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        $user->subMenu = $request['subMenu'];
        $user->name = $request['name'];
        $user->image = $image;
        $user->is_Active = 1;
        $user->save();
        $table = Birthday::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.birthday.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Birthday::find($id);
        return view('frontend.birthday.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Birthday::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Birthday::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Birthday::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.birthday.table')->with('table', $table);
    }
}
