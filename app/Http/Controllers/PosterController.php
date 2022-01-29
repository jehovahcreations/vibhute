<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Poster;
use App\Models\Mainmenu;


class PosterController extends Controller
{

    function table()
    {
        // return $id;
        $table = Poster::get();
       // $menu = Poster::get();
        return view('frontend.poster.table')->with('table', $table);
    }
    function create()
    {
        $table = Submenu::get();
        return view('frontend.poster.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Poster::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Poster::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.poster.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Poster::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Poster::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.poster.table')->with('table', $table);
    }
    function delete($id)
    {
        Poster::destroy($id);
        $table = Poster::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.poster.table')->with('table', $table);
    }
  
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        $user = new Poster();
        $user->mainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        $user->subMenu = $request['subMenu'];
        $user->name = $request['name'];
        $user->image = $image;
        $user->is_Active = 1;
        $user->save();
        $table = Poster::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.poster.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Poster::find($id);
        return view('frontend.poster.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Poster::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Poster::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Poster::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.poster.table')->with('table', $table);
    }
}
