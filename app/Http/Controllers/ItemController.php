<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.item.index', compact('items', 'brands', 'subcategories'))->with('i');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.item.create', compact('brands', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeno' => 'required',
            'name' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png',
            'price' => 'required',
            'discount' => 'sometimes',
            'description' => 'required',
            'brand_id' => 'required',
            'subcategory_id' => 'required',
        ]);

        if ($request->file()) {
            $bathphoto = '/store/itemimg/';
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->file('photo')->move(public_path('store/itemimg'), $fileName);

            $path = $bathphoto . $fileName;
        }


        $item = new Item;
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->photo = $path;
        $item->price = $request->price;
        if ($request->discount == null) {
            $item->discount = 0;
        } else {
            $item->discount = $request->discount;
        }

        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;

        $item->save();

        return redirect()->route('items.index')
            ->with('success', 'Item created Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('backend.item.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.item.edit', compact('item', 'brands', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'codeno' => 'sometimes',
            'name' => 'sometimes',
            'photo' => 'sometimes|mimes:jpg,jpeg,png',
            'price' => 'sometimes',
            'discount' => 'sometimes',
            'description' => 'sometimes',
            'brand_id' => 'sometimes',
            'subcategory_id' => 'sometimes',
        ]);

        if ($request->file()) {
            $bathphoto = '/store/itemimg/';
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->file('photo')->move(public_path('store/itemimg'), $fileName);

            $path = $bathphoto . $fileName;
            $item->photo = $path;
        }



        $item->codeno = $request->codeno;
        $item->name = $request->name;

        $item->price = $request->price;
        if ($request->discount == null) {
            $item->discount = 0;
        } elseif($request->discount != null) {
            $item->discount = $request->discount;
        }

        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;

        $item->save();

        return redirect()->route('items.index')
            ->with('success', 'Item created Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
