<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::all();
        return view('back_office.contact.index', compact('messages'));
    }

    public function show($id)
    {
        $contactData = Contact::find($id);
        return view('back_office.contact.show', compact('contactData'));
    }

    public function delete(Request $request)
    {
        $contactData = Contact::find($request->get('slug'));
        $delectContactData = $contactData->delete();

        if ($delectContactData) {
            toast('Message Deleted Successfully.', 'success');
            return redirect()->route('show-message');
        } else {
            toast('Something wend wrong try again.', 'error');
            return redirect()->route('show-message');
        }
    }
}
