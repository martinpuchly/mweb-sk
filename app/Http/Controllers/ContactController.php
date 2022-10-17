<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Inertia\Inertia;
use phpDocumentor\Reflection\Types\Boolean;

class ContactController extends Controller
{
    
    public function show(Contact $contact){
        return Inertia::render('Admin/Contacts/Show', [
            'contact'=>$contact
        ]);    
    }

    public function switchViewed(Contact $contact, $onOff){
        $contact->viewed = ($onOff == 'true' ? 1 : 0);
        $contact->save();
        return redirect()->route('admin.contact.show', ['contact'=>$contact]);
    }
    

    public function adminList(){
        return Inertia::render('Admin/Contacts/AdminList', [
            'contacts'=>Contact::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }


    public function create(){
        return Inertia::render('Contacts/Create');
    }
    public function store(ContactRequest $request){
        $contact = Contact::create($request->validated());
        return redirect()->route('contact')->with('succeed', 'Správa bola odoslaná. Ďakujeme.');
    }



    public function delete(Contact $contact){
        $contact->delete();
        return redirect()->route('admin.contact')->with('error', 'Správa bola vymazaná.');
    }







}
