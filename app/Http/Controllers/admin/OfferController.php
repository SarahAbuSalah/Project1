<?php

namespace App\Http\Controllers\admin;

use App\Models\offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = offer::orderByDesc('id')->paginate(10);

        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offers = offer::all();
        return view('admin.offers.create' , compact('offers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image'   => 'required',
            'title'   => 'required',
            ]);
        // Upload Images
                $img_name = null;
                if($request->hasFile('image')) {
                    $image = $request->file('image');
                    $img_name = rand(). time().$image->getClientOriginalName();
                    $image->move(public_path('uploads/offers'), $img_name);
                }
                  // Store To Database
        offer::create([
            'content' =>  $request->content,
            'image'   =>  $img_name,
            'title'   =>  $request->title,
            ]);

         // Redirect
         return redirect()->route('admin.offers.index')->with('msg', 'offer added successfully')->with('type', 'success');

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
        $offer = offer::findOrFail($id);
        $offers = offer::all();

        return view('admin.offers.edit', compact('offer', 'offers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Data
        $request->validate([
            'content' => 'required',
            'image'   => 'nullable|image|mimes:png,jpg,jpeg,svg,gif',
            'title'   => 'required',
        ]);

        $offer = offer::findOrFail($id);

          // Upload Images
          $img_name = $offer->image;
          if($request->hasFile('image')) {
              $image = $request->file('image');
              $img_name = rand(). time().$image->getClientOriginalName();
              $image->move(public_path('uploads/offers'), $img_name);
          }

          // Store To Database
          $offer->update([
            'content' =>  $request->content,
            'image'   =>  $img_name,
            'title'   =>  $request->title,
          ]);

          // Redirect
          return redirect()->route('admin.offers.index')->with('msg', 'offer updated successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer = offer::findOrFail($id);

        File::delete(public_path('uploads/offers/'.$offer->image));


        $offer->delete();

        return redirect()->route('admin.offers.index')->with('msg', 'offer deleted successfully')->with('type', 'danger');

    }

    public function trash()
    {
        $offers = offer::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.offers.trash', compact('offers'));
    }

    public function restore($id)
    {
        offer::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.offers.index')->with('msg', 'offer restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        offer::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.offers.index')->with('msg', 'offer deleted permanintly successfully')->with('type', 'danger');
    }
}
