<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    function index()
    {

        $menu = Contact::get();
        return $menu;
    }
    function dashboard()
    {
        return view('dashboard');
    }
    function table()
    {
        // return $id;
        $table = Contact::get();
        return view('frontend.contact.table')->with('table', $table);
    }
    function deactive($id)
    {
        $login = Contact::find($id);
        $login->is_Active = 2;
        $login->save();
        $table = Contact::get();
        Session::flash('message', 'Sucessfully Deactivated !!!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.contact.table')->with('table', $table);
    }
    function active($id)
    {
        $login = Contact::find($id);
        $login->is_Active = 1;
        $login->save();
        $table = Contact::get();
        Session::flash('message', 'Successfully Activated!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.contact.table')->with('table', $table);
    }
    function delete($id)
    {
        Contact::destroy($id);
        $table = Contact::get();
        Session::flash('message', 'Deleted Successfully!');
        Session::flash('alert-class', 'alert-danger');
        return view('frontend.contact.table')->with('table', $table);
    }
    function addContact(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $user = new Contact();
        $user->name = $request['name'];
        $user->decp = $request['decp'];
        $user->is_Active = 1;
        $user->image = $image;
        $user->save();
        $table = Contact::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.contact.table')->with('table', $table);
    }
    function edit($id)
    {
        $table = Contact::find($id);
        return view('frontend.contact.edit')->with('table', $table);
    }
    function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $update = Contact::find($request['id']);
            // {{-- 'whatsapp','email','facebook','website','address','offer','soffer','gpay',
            // 'phonepe','paytm','acc','bank','btanch','ifsc','ren','rene','image', --}}
            $update->whatsapp = $request['whatsapp'];
            $update->email = $request['email'];
            $update->facebook = $request['facebook'];
            $update->website = $request['website'];
            $update->address = $request['address'];
            $update->offer = $request['offer'];
            $update->soffer = $request['soffer'];
            $update->gpay = $request['gpay'];
            $update->phonepe = $request['phonepe'];
            $update->paytm = $request['paytm'];
            $update->acc = $request['acc'];
            $update->bank = $request['bank'];
            $update->btanch = $request['btanch'];
            $update->ifsc = $request['ifsc'];
            $update->ren = $request['ren'];
            $update->rene = $request['rene'];
            $update->image = $image;
            $update->save();
        } else {
            $update = Contact::find($request['id']);
            $update->whatsapp = $request['whatsapp'];
            $update->email = $request['email'];
            $update->facebook = $request['facebook'];
            $update->website = $request['website'];
            $update->address = $request['address'];
            $update->offer = $request['offer'];
            $update->soffer = $request['soffer'];
            $update->gpay = $request['gpay'];
            $update->phonepe = $request['phonepe'];
            $update->paytm = $request['paytm'];
            $update->acc = $request['acc'];
            $update->bank = $request['bank'];
            $update->btanch = $request['btanch'];
            $update->ifsc = $request['ifsc'];
            $update->ren = $request['ren'];
            $update->rene = $request['rene'];
            $update->image = $request['img'];
            $update->save();
        }
        $table = Contact::get();
        Session::flash('message', 'Saved Successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('frontend.contact.table')->with('table', $table);
    }
}
