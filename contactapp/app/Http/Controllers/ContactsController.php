<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth');
    } 
    public function index(Request $request)
    {
        $user = Auth::user();
        $user->load('contacts');
        return view('home', compact('user'));
        
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:25', 'email' => 'required']);

       $requestData = $request->all(); 
       $contact = new Contact($requestData);

       $contact['user_id'] = auth()->id();
       $contact['name'] = $requestData['name'];
       $contact['email'] = $requestData['email'];
       $contact->save();

      return redirect('/contacts')->with('success', 'Contact toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required']);

        $requestData = $request->all();

        $contact['user_id'] = auth()->id();
        $contact['name'] = $requestData['name'];
        $contact['email'] = $requestData['email'];

        $contact->save();

        return redirect('/contacts')->with('success', 'Contact bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact verwijderd');
    }
}
