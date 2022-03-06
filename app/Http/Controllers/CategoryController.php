<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            "photo" => 'required:mimes:jpg,jpeg,png',
        ]);

        if($request->file()){

            $fileName=time().'_'.$request->photo->getClientOriginalName();

            $filepath=$request->file('photo')->storeAs('categoryimg',$fileName,'public');

            $path='/store/'.$filepath;
        }
        $category=new Category;
        $category->name=$request->name;
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
            'name' => 'require',
            'photo' => 'require',
        ]);

        // $photoName = time() . $request->photo->extension();

        // $request->photo->move(public_path('categoryimg'), $photoName);

        // $path = 'categoryimg/' . $photoName;

        // $category = new Category;

        // $category->name = $request->name;
        // $category->photo = $path;

        // $category->save();
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
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category Delete Successfully');
    }
}
