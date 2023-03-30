<?php

namespace App\Http\Controllers\admin;

use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = service::orderByDesc('id')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = service::all();
        return view('admin.services.create' , compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'    => 'required',
            'title'   => 'required',
            'content' => 'required',
            'content' => 'required',
        ]);

                  // Store To Database
        service::create([
            'icon'    =>  $request->icon,
            'title'   =>  $request->title,
            'content' =>  $request->content,
        ]);

         // Redirect
         return redirect()->route('admin.services.index')->with('msg', 'service added successfully')->with('type', 'success');

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
        $service = service::findOrFail($id);
        $services = service::all();

        return view('admin.services.edit', compact('service', 'services'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Data
        $request->validate([
            'icon'    => 'required',
            'title'   => 'required',
            'content' => 'required',
            'content' => 'required',
        ]);

        $service = service::findOrFail($id);

          // Store To Database
          $service->update([
            'icon'    =>  $request->icon,
            'title'   =>  $request->title,
            'content' =>  $request->content,

          ]);

          // Redirect
          return redirect()->route('admin.services.index')->with('msg', 'service updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = service::findOrFail($id);

        File::delete(public_path('uploads/services/'.$service->image));


        $service->delete();

        return redirect()->route('admin.services.index')->with('msg', 'service deleted successfully')->with('type', 'danger');

    }

    public function trash()
    {
        $services = service::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.services.trash', compact('services'));
    }

    public function restore($id)
    {
        service::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.services.index')->with('msg', 'service restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        service::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.services.index')->with('msg', 'service deleted permanintly successfully')->with('type', 'danger');
    }
}
