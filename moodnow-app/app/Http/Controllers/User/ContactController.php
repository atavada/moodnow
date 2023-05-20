<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        return view('user.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'message' => 'required'
        ]);

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ]);

        if($contact) {
            //redirect dengan pesan sukses
            return redirect()->route('user.contact.index')->with(['success' => 'Berhasil Mengirim.']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.contact.index')->with(['error' => 'Gagal Terkirim.']);
        }
    }
}
