<?php

namespace App\Http\Controllers\admin;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = contact::orderByDesc('id')->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = contact::all();
        return view('admin.contacts.create' , compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message'    => 'required',
            'location'  => 'required',
            'phone'   => 'required',
        ]);


                       // Store To Database
                       contact::create([
                        'name'   =>  $request->name,
                        'email'   =>  $request->email,
                        'subject' =>  $request->subject,
                        'message'    =>  $request->message,
                        'location'  =>  $request->location,
                        'phone'   =>  $request->phone,
                    ]);

         // Redirect
         return redirect()->route('admin.contacts.index')->with('msg', 'contact added successfully')->with('type', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = contact::findOrFail($id);
        $contacts = contact::all();

        return view('admin.contacts.edit', compact('contact', 'contacts'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Data
        $request->validate([
            'name'   => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message'    => 'required',
            'location'  => 'required',
            'phone'   => 'required',
        ]);

        $contact = contact::findOrFail($id);

          // Store To Database
          $contact->update([
            'name'   =>  $request->name,
            'email'   =>  $request->email,
            'subject' =>  $request->subject,
            'message'    =>  $request->message,
            'location'  =>  $request->location,
            'phone'   =>  $request->phone,

          ]);

          // Redirect
          return redirect()->route('admin.contacts.index')->with('msg', 'contact updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = contact::findOrFail($id);

        File::delete(public_path('uploads/contacts/'.$contact->image));


        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('msg', 'contact deleted successfully')->with('type', 'danger');

    }

    public function trash()
    {
        $contacts = contact::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.contacts.trash', compact('contacts'));
    }

    public function restore($id)
    {
        contact::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.contacts.trash')->with('msg', 'contact restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        contact::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.contacts.trash')->with('msg', 'contact deleted permanintly successfully')->with('type', 'danger');
    }
}
