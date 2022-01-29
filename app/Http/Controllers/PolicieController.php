<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Policie;


class PolicieController extends Controller
{

    function table()
    {
        // return $id;
        $table = Policie::get();
        return view('frontend.Policy.table')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Policie::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Policie::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.Policy.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Policie::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Policie::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.Policy.table')->with('table', $table);
    }
    function delete($id)
    {
        Policie::destroy($id);
        $table = Policie::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.Policy.table')->with('table', $table);
    }
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Policie();
        $user->name = $request['name'];
        $user->desc = $request['desc'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Policie::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.Policy.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Policie::find($id);
        return view('frontend.Policy.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Policie::find($request['id']);
            $update->name = $request['name'];
            $update->desc = $request['desc'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Policie::find($request['id']);
            $update->name = $request['name'];
            $update->desc = $request['desc'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Policie::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.policy.table')->with('table', $table);
    }
}
