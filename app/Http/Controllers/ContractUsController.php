<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContractUsController extends Controller
{
    public function view() {

        return view ('FrontEnd.include.contact') ;

    }
    public function show(Request $request)
    {

        // Contact::create([
        // 'Name'= $request->Name,
        // 'Email'->Email = $request->Email,
        // 'Phone_Number'->Phone_Number = $request->Phone_Number,
        // 'Message'->Message = $request->Message

        // ]);

$request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'min:11| max:14|required',
            'message'  => 'required'
        ]);

        $ContractUs = new Contact();

        $ContractUs->name = $request->name;
        $ContractUs->email = $request->email;
        $ContractUs->phone_number = $request->phone_number;
        $ContractUs->message = $request->message;
        $ContractUs->save();

        return back()->with('sms', 'Contact data  Saved Successfully!!!');

    }
}

