<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DNS2D;

class HomeController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('show',compact('users'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'age' => 'required',
            'state' => 'required',
            'city' => 'required',
            'occupation' => 'required',
            'marital' => 'required'
        ]);
        $number = mt_rand(11111111111,99999999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->age = $request->age;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->occupation = $request->occupation;
        $user->marital_staus = $request->marital;
        $user->p_name = $request->p_name;
        $user->p_age = $request->p_age;
        $user->account_number = $number;
        $user->save();
        return redirect()->route('show')->with('success',"Data Inserted.");
    }

    public function generateQrCode($id)
    {
        $user = User::find($id);
        if ($user) {
            $qrCode = DNS2D::getBarcodeHTML("$user->name,$user->email,$user->contact,$user->state,$user->city", "QRCODE", 4, 4);
            return response()->json(['qrCode' => $qrCode]);
        }
        return response()->json(['qrCode' => 'User not found']);
    }
}
