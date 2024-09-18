<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;

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

        $user->save();
        return response()->json(['message' => 'Data inserted successfully']);
    }

    public function generateQrCode($id)
    {
        // Fetch user details
        $user = User::findOrFail($id);

        // Generate QR code data (you can customize this as needed)
        $qrData = 'Name: ' . $user->name . ', Email: ' . $user->email . ', Contact: ' . $user->contact;

        // Generate QR code in base64
        $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($qrData));

        // Redirect back with the QR code in session
        return redirect()->back()->with(['qr' => $qrCode]);
    }
}
