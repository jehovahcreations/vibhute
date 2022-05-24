<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Datalist;
use App\Models\Data;
use App\Models\Applink;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    function index()
    {

        $data = Data::get();
        return $data;
    }
    function dashboard()
    {
        $table = Data::get();
        return $table;
    }
    function table()
    {
        $table = Data::get();
        return view('admin.menu.table')->with('table', $table);
    }

    function deactive($id)
    {
        $login = Data::find($id);
        $login->isActive = 2;
        $login->save();
        $table = Data::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('admin.Data.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Data::find($id);
        $login->isActive = 1;
        $login->save();
        $table = Data::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('admin.Data.table')->with('table', $table);
    }
    function delete($id)
    {
        Data::destroy($id);
        $table = Data::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('admin.Data.table')->with('table', $table);
    }
    function addmenu(Request $request)
    {
    //    // $image = base64_encode(file_get_contents($request->file('image')));
    //     $user = new Data();
    //     $user->vid = $request['vid'];
    //     $user->name = $request['name'];
    //     $user->dob = $request['dob'];
    //     $user->gender = $request['gender'];
    //     $user->data = $request['data'];
    //     $user->isActive = 1;
    //     $user->save();
    //     $table = Data::where("_id",$user->id)->get();
    //     // Session::flash('message', 'Saved Successfully!');
    //     // Session::flash('alert-class', 'alert-success');
    //      return view('admin.menu.create')->with('table', $table);
    Data::create([
        'name' => $request->name,
        'vid' => $request->vid,
        'dob' => $request->dob,
        'data' => $request->data,
        'gender' => $request->gender
      ]);
      
      return response()->json(['success'=>'Form is successfully submitted!']);
    }
    function edit($id)
    {
        $table = Data::find($id);
        return view('admin.Data.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Data::find($request['id']);
            $update->name = $request['name'];
            $update->decp = $request['decp'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Data::find($request['id']);
            $update->name = $request['name'];
            $update->decp = $request['decp'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Data::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('admin.Data.table')->with('table', $table);
    }
}
