<?php

namespace App\Http\Controllers\admin;

use App\Models\client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = client::orderByDesc('id')->paginate(10);

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = client::all();
        return view('admin.clients.create' , compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo'   => 'required',
        ]);

                  // Store To Database
        client::create([
            'logo'   =>  $request->logo,
           ]);

         // Redirect
         return redirect()->route('admin.clients.index')->with('msg', 'client added successfully')->with('type', 'success');

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
        $client = client::findOrFail($id);
        $clients = client::all();

        return view('admin.clients.edit', compact('client', 'clients'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Data
        $request->validate([
            'logo'   => 'required',
           ]);

        $client = client::findOrFail($id);

          // Store To Database
          $client->update([
            'logo'   =>  $request->logo,
            ]);

          // Redirect
          return redirect()->route('admin.clients.index')->with('msg', 'client updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = client::findOrFail($id);

        File::delete(public_path('uploads/clients/'.$client->image));


        $client->delete();

        return redirect()->route('admin.clients.index')->with('msg', 'client deleted successfully')->with('type', 'danger');

    }

    public function trash()
    {
        $clients = client::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.clients.trash', compact('clients'));
    }

    public function restore($id)
    {
        client::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.clients.trash')->with('msg', 'client restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        client::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.clients.trash')->with('msg', 'client deleted permanintly successfully')->with('type', 'danger');
    }
}
