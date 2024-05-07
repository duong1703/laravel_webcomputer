<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Client\ContactModel;
use Mail;



class ContactController extends Controller
{
    public function index(){
        return view('/client/pages/contact');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required|digits:10|numeric',
    //         'subject' => 'required',
    //         'message' => 'required'
    //     ]);
        
    //     Mail::to('dduong1703@gmail.com')->send(new ContactMail($request->all()));

    //     Mail::insert($request->all());
  
    //     return redirect()->back()
    //                      ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
  
        ContactModel::create($request->all());
  
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

    
}
