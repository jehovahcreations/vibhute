<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Banner;


class BannerController extends Controller
{

    function table()
    {
        $table = Banner::get();
       // return $table;
        return view('frontend.banner.table')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Banner::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Banner::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.banner.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Banner::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Banner::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.banner.table')->with('table', $table);
    }
    function delete($id)
    {
        Banner::destroy($id);
        $table = Banner::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.banner.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Banner();
        $user->name = $request['name'];
        $user->decp = $request['decp'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Banner::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.banner.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Banner::find($id);
        return view('frontend.banner.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Banner::find($request['id']);
            $update->name = $request['name'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Banner::find($request['id']);
            $update->name = $request['name'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Banner::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.banner.table')->with('table', $table);
    }
}
