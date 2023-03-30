<?php

namespace App\Http\Controllers\admin;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = blog::orderByDesc('id')->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = blog::all();
        return view('admin.blogs.create' , compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'   => 'required',
            'title'   => 'required',
            'content' => 'required',
            'date'    => 'required',
            'writer'  => 'required',
            'viwer'   => 'required',
        ]);
        // Upload Images
                $img_name = null;
                if($request->hasFile('image')) {
                    $image = $request->file('image');
                    $img_name = rand(). time().$image->getClientOriginalName();
                    $image->move(public_path('uploads/blogs'), $img_name);
                }
                  // Store To Database
        blog::create([
            'image'   =>  $img_name,
            'title'   =>  $request->title,
            'content' =>  $request->content,
            'date'    =>  $request->date,
            'writer'  =>  $request->writer,
            'viwer'   =>  $request->viwer,
        ]);

         // Redirect
         return redirect()->route('admin.blogs.index')->with('msg', 'blog added successfully')->with('type', 'success');

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
        $blog = blog::findOrFail($id);
        $blogs = blog::all();

        return view('admin.blogs.edit', compact('blog', 'blogs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Data
        $request->validate([
            'image'   => 'required',
            'title'   => 'required',
            'content' => 'required',
            'date'    => 'required',
            'writer'  => 'required',
            'viwer'   => 'required',
        ]);

        $blog = blog::findOrFail($id);

          // Upload Images
          $img_name = $blog->image;
          if($request->hasFile('image')) {
              $image = $request->file('image');
              $img_name = rand(). time().$image->getClientOriginalName();
              $image->move(public_path('uploads/blogs'), $img_name);
          }

          // Store To Database
          $blog->update([
            'image'   =>  $img_name,
            'title'   =>  $request->title,
            'content' =>  $request->content,
            'date'    =>  $request->date,
            'writer'  =>  $request->writer,
            'viwer'   =>  $request->viwer,

          ]);

          // Redirect
          return redirect()->route('admin.blogs.index')->with('msg', 'blog updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = blog::findOrFail($id);

        File::delete(public_path('uploads/blogs/'.$blog->image));


        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('msg', 'blog deleted successfully')->with('type', 'danger');

    }

    public function trash()
    {
        $blogs = blog::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.blogs.trash', compact('blogs'));
    }

    public function restore($id)
    {
        blog::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.blogs.index')->with('msg', 'blog restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        blog::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.blogs.index')->with('msg', 'blog deleted permanintly successfully')->with('type', 'danger');
    }
}
