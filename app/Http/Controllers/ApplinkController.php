<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Applink;


class ApplinkController extends Controller
{

    function table()
    {
        // return $id;
        $table = Applink::get();
        return view('frontend.setting.table')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Applink::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Applink::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.setting.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Applink::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Applink::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.setting.table')->with('table', $table);
    }
    function delete($id)
    {
        Applink::destroy($id);
        $table = Applink::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.setting.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Applink();
        $user->name = $request['name'];
        $user->decp = $request['decp'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Applink::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.setting.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Applink::find($id);
        return view('frontend.setting.edit')->with('table', $table);
    }
    function update(Request $request)
    {
            $update = Applink::find($request['id']);
            $update->link = $request['link'];
            $update->http = $request['http'];
            $update->save();

        $table = Applink::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.setting.table')->with('table', $table);
    }
}
