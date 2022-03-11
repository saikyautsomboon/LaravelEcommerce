<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.index', compact('brands'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
            'name' => 'required|min:3',
            'photo' => 'required|mimes:jpg,jpeg,png',

        ]);
        if ($request->file()) {
            $bathphot = '/store/brandimg/';
            $fileName = time() . '_' . $request->photo->getClientOriginalName();

            $request->file('photo')->move(public_path('store/brandimg'), $fileName);

            $path = $bathphot . $fileName;
        }

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;

        $brand->save();

        return redirect()->route('brands.index')
            ->with('success', 'Brand Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|min:3',
            'photo' => 'sometimes|mimes:jpg,jpeg,png',

        ]);
        if ($request->file()) {
            $bathphot = '/store/brandimg/';
            $fileName = time() . '_' . $request->photo->getClientOriginalName();

            $request->file('photo')->move(public_path('store/brandimg'), $fileName);

            $path = $bathphot . $fileName;
            $brand->photo = $path;
        }
        $brand->name = $request->name;


        $brand->save();

        return redirect()->route('brands.index')
            ->with('success', 'Brand Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')
            ->with('success', 'Brand Delete Successfully');
    }
}
