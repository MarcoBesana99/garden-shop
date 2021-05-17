<?php

namespace App\Http\Controllers;

use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $productId = $productId;
        $descriptions = Description::where('product_id', $productId)->get();
        return view('admin.descriptions', compact('descriptions', 'productId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        return view('admin.add-description', ['productId' => $productId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $request->validate([
            'title:en' => 'required',
            'title:ru' => 'required',
            'content:en' => 'required',
            'content:ru' => 'required',
        ]);

        $images = [];

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/img/descriptions/', $name);
                $images[] = $name;
            }
        }

        $data = [
            'product_id' => $productId,
            'en' => [
                'title' => $request->input('title:en'),
                'content' => $request->input('content:en'),
            ],
            'ru' => [
                'title' => $request->input('title:ru'),
                'content' => $request->input('content:ru'),
            ]
        ];

        if (count($images) != 0) {
            $data['images_path'] = json_encode($images);
        }

        Description::create($data);
        return redirect()->back()->with('success', 'Description added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productId, $id)
    {
        return view('admin.description', ['description' => Description::where('id', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productId, $id)
    {
        return view('admin.edit-description', ['productId' => $productId, 'description' => Description::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId, Description $description)
    {
        $request->validate([
            'title:en' => 'required',
            'title:ru' => 'required',
            'content:en' => 'required',
            'content:ru' => 'required',
        ]);

        $images = [];

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/img/descriptions/', $name);
                $images[] = $name;
            }
        }

        $data = [
            'product_id' => $productId,
            'en' => [
                'title' => $request->input('title:en'),
                'content' => $request->input('content:en'),
            ],
            'ru' => [
                'title' => $request->input('title:ru'),
                'content' => $request->input('content:ru'),
            ]
        ];

        if (count($images) != 0) {
            $data['images_path'] = json_encode($images);
        }

        $description ->update($data);
        return redirect()->back()->with('success', 'Description updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, $id)
    {
        Description::find($id)->delete();
        return redirect()->back()->with('success', 'Description deleted successfully');
    }
}
