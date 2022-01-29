<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Categorie;
use App\Models\Mainmenu;


class CategorieController extends Controller
{

    function table()
    {
        // return $id;
        $table = Categorie::get();
       // $menu = Categorie::get();
        return view('frontend.category.table')->with('table', $table);
    }
    function create()
    {
        $table = Submenu::get();
        return view('frontend.category.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Categorie::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Categorie::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.category.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Categorie::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Categorie::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.category.table')->with('table', $table);
    }
    function delete($id)
    {
        Categorie::destroy($id);
        $table = Categorie::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.category.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        //{{-- "mainMenu","mainMenuNo","Categorie","CategorieNo","is_Active","icon", --}}
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        //return $mainmenu;
        $user = new Categorie();
        $user->mainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        $user->icon = $request['icon'];
        $user->subMenu = $request['subMenu'];
        $user->categoryName = $request['categoryName'];
        $user->is_Active = 1;
        $user->save();
        $table = Categorie::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.category.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Categorie::find($id);
        return view('frontend.category.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Categorie::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Categorie::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Categorie::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.category.table')->with('table', $table);
    }
}
