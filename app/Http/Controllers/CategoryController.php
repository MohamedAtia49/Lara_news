<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories =Category::all();
        return view('categories.index' , compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // 1 Validate
        $this->validate($request,[
            "name" => "required|unique:categories|max:50|min:3|alpha",
        ]);

        // 2 Store
        $category =new Category();
        $category->name =$request->name;
        $category->save();
        // 3
        return redirect()->route('categories')->with("message" , "Category Added successfully");

    }// function store

    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    public function update(Request $request, Category $category)
    {
         // 1 Validate
         $this->validate($request,[
            "name" => "required|unique:categories|max:50|min:3|string"
        ]);

        // 2 Update
        $category->name = $request->name ;
        $category->save();

        // 3
        return redirect()->route('categories')->with("message" , "Category Updated successfully");

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')->with("message" , "Category deleted successfully");
    }
}
