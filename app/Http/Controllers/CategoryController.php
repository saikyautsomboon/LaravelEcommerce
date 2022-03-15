<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'))->with('i');
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            "name" => 'required|min:3',
            "photo" => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($request->file()) {
            $bathphoto = '/store/categoryimg/';
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->file('photo')->move(public_path('store/categoryimg'), $fileName);

            $path = $bathphoto . $fileName;
        }
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $path;

        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Category created Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            "name" => 'required|min:3',
            "photo" => 'sometimes|mimes:jpg,jpeg,png',
        ]);

        if ($request->file()) {
            $bathphoto = '/store/categoryimg/';
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->file('photo')->move(public_path('store/categoryimg'), $fileName);

            $path = $bathphoto . $fileName;
            if ($category->photo == $path) {
                unlink($path);
            }
            $category->photo = $path;
        }

        $category->name = $request->name;


        $category->save();
        return redirect()->route('categories.index')
            ->with('success', 'Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $subcategory = new Subcategory;

        if ($category->id == $subcategory->category_id) {
            $category->delete();
        }
        return redirect()->route('categories.index')
            ->with('success', 'Category Delete Successfully');
    }
}
