<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Lic;
use App\Models\Mainmenu;


class LicController extends Controller
{

    function table()
    {
        // return $id;
        $table = Lic::get();
       // $menu = Lic::get();
        return view('frontend.lic.table')->with('table', $table);
    }
    function create()
    {
        $table = Categorie::get();
        return view('frontend.lic.create')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Lic::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Lic::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.lic.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Lic::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Lic::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.lic.table')->with('table', $table);
    }
    function delete($id)
    {
        Lic::destroy($id);
        $table = Lic::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.lic.table')->with('table', $table);
    }
  
    function addabout(Request $request)
    {
        // $image = base64_encode(file_get_contents($request->file('image')));
        // $plan = base64_encode(file_get_contents($request->file('image')));
        $file = $request->file('pdf');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $mainmenu = Mainmenu::where('menuName', $request['mainMenu'])->get();
        $user = new Lic();
        $user->MainMenu = $request['mainMenu'];
        $user->mainMenuNo = $mainmenu[0]->menuNumber;
        // $user->icon = $request['icon'];
        $user->SubMenu = $request['subMenu'];
        $user->Category = $request['category'];
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
        // $user->image = $image;
        // $user->plan = $plan;
        $user->pdf = 'uploads/'.$file->getClientOriginalName();
        $user->is_Active = 1;
        $user->save();
        $table = Lic::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.lic.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Lic::find($id);
        return view('frontend.lic.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Lic::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Lic::find($request['id']);
            $update->name = $request['name'];
            $update->url = $request['url'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Lic::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.lic.table')->with('table', $table);
    }
}
