<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Comboexpert;
use App\Models\Mainmenu;


class ComboexpertController extends Controller
{

    function table()
    {
        // return $id;
        $table = Comboexpert::get();
       // $menu = Comboexpert::get();
        return view('frontend.comboexpert.table')->with('table', $table);
    }
    function create()
    {
        $table = Submenu::get();
        return view('frontend.comboexpert.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Comboexpert::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Comboexpert::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.comboexpert.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Comboexpert::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Comboexpert::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.comboexpert.table')->with('table', $table);
    }
    function delete($id)
    {
        Comboexpert::destroy($id);
        $table = Comboexpert::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.comboexpert.table')->with('table', $table);
    }
  
    function addabout(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $plan = base64_encode(file_get_contents($request->file('image')));
        $file = $request->file('pdf');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        $user = new Comboexpert();
        $user->mainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        $user->icon = $request['icon'];
        $user->subMenu = $request['subMenu'];
        $user->MinimumAgeatEntry = $request['MinimumAgeatEntry'];
        $user->MaximumAgeatEntry = $request['MaximumAgeatEntry'];
        $user->MaximumMaturityAge = $request['MaximumMaturityAge'];
        $user->PolicyTerm = $request['PolicyTerm'];
        $user->MinimumSumAssured = $request['MinimumSumAssured'];
        $user->MaximumSumAssured = $request['MaximumSumAssured'];
        $user->PremiumMode = $request['PremiumMode'];
        $user->RidersAvailable = $request['RidersAvailable'];
        $user->SurrenderValue = $request['SurrenderValue'];
        $user->LoanAvailable = $request['LoanAvailable'];
        $user->OtherBenefit = $request['OtherBenefit'];
        $user->name = $request['name'];
        $user->image = $image;
        $user->plan = $plan;
        $user->pdf = 'uploads/'.$file->getClientOriginalName();
        $user->is_Active = 1;
        $user->save();
        $table = Comboexpert::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.comboexpert.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Comboexpert::find($id);
        return view('frontend.comboexpert.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Comboexpert::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Comboexpert::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Comboexpert::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.comboexpert.table')->with('table', $table);
    }
}
