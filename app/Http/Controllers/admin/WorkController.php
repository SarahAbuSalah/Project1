<?php

namespace App\Http\Controllers\admin;

use App\Models\work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work = work::orderByDesc('id')->paginate(10);

        return view('admin.works.index', compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $work = work::all();
        return view('admin.works.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        // Upload Images
                $img_name = null;
                if($request->hasFile('image')) {
                    $image = $request->file('image');
                    $img_name = rand(). time().$image->getClientOriginalName();
                    $image->move(public_path('uploads/work'), $img_name);
                }
                  // Store To Database
        work::create([
            'title' => $request->title,
            'image' => $img_name,
            'content' => $request->content,
        ]);
         // Redirect
         return redirect()->route('admin.works.index')->with('msg', 'work added successfully')->with('type', 'success');
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
        $work = work::findOrFail($id);
        $works = work::all();

        return view('admin.works.edit', compact('work', 'works'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate Data
         $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);
        $work = work::findOrFail($id);

          // Upload Images
          $img_name = $work->image;
          if($request->hasFile('image')) {
              $image = $request->file('image');
              $img_name = rand(). time().$image->getClientOriginalName();
              $image->move(public_path('uploads/work'), $img_name);
          }

          // Store To Database
          $work->update([
              'title' => $request->title,
              'image' => $img_name,
              'content' => $request->content,

          ]);

          // Redirect
          return redirect()->route('admin.works.index')->with('msg', 'work updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work = work::findOrFail($id);

        File::delete(public_path('uploads/work/'.$work->image));


        $work->delete();

        return redirect()->route('admin.works.index')->with('msg', 'work deleted successfully')->with('type', 'danger');
    }

    public function trash()
    {
        $work = work::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.works.trash', compact('work'));
    }

    public function restore($id)
    {
        work::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.works.index')->with('msg', 'work restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        work::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.works.index')->with('msg', 'work deleted permanintly successfully')->with('type', 'danger');
    }
}
