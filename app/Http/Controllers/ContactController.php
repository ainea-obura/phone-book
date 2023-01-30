<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('contacts.index',compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('contacts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'regex:/^\d{10}$|^\d{3}-\d{3}-\d{4}$|^\(\d{3}\)\d{3}-\d{4}$/'],
        ]);
        $contact = $request->all();
        // Split the name into first and last name
        $nameParts = explode(" ", $contact['name']);
        $contact['first_name'] = $nameParts[0];
        $contact['last_name'] = $nameParts[1];
        Contact::create($contact);
        return redirect()->route('contacts.index')->with('success','Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show',compact('contact'));
    }
    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }
    
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'fist_name' => ['string'],
            'last_name' => ['string'],
            'phone' => ['required', 'regex:/^\d{10}$|^\d{3}-\d{3}-\d{4}$|^\(\d{3}\)\d{3}-\d{4}$/'],
        ]);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success','Contact updated successfully');
    }
    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success','Contact deleted successfully');
    }

}
