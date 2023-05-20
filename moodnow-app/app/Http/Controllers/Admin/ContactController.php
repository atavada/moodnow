<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * __construct
     */
    public function __construct()
    {
        $this->middleware(['permission:contacts.index|contacts.delete']);
    }

    /**
     * index
     */
    public function index()
    {
        $contacts = Contact::latest()->when(request()->q, function($contacts) {
            $contacts = $contacts->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        if($contact) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
