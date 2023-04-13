<?php

namespace App\Http\Controllers\admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = category::orderByDesc('id')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.categories.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
                  // Store To Database
        category::create([
            'name' =>  $request->name,
            ]);

         // Redirect
         return redirect()->route('admin.categories.index')->with('msg', 'category added successfully')->with('type', 'success');

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
        $category = category::findOrFail($id);
        $categories = category::all();

        return view('admin.categories.edit', compact('category', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Data
        $request->validate([
            'name' => 'required',
            ]);

        $category = category::findOrFail($id);

          // Store To Database
          $category->update([
            'name'   =>  $request->name,
            ]);

          // Redirect
          return redirect()->route('admin.categories.index')->with('msg', 'category updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::findOrFail($id);

        File::delete(public_path('uploads/categories/'.$category->image));


        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg', 'category deleted successfully')->with('type', 'danger');

    }

    public function trash()
    {
        $categories = category::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        category::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.categories.index')->with('msg', 'category restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        category::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.categories.index')->with('msg', 'category deleted permanintly successfully')->with('type', 'danger');
    }}
