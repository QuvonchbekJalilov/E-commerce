<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $number = 1;
        $categories = Category::all()->sortByDesc('id');

        return view('admin.categories.index', compact('categories', 'number'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $categories = Category::all();

        if ($categories->where('name', ucfirst($request->name) )->isNotEmpty()) {
            return redirect()->route('categories.index')->with('success', "category already exists");
        } else {
            Category::create([
                'name' => ucfirst($request->name)
            ]);
        }

        return redirect()->route('categories.index')->with('success', "category added successfully");
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        $category = Category::find($category->id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            $category->name = ucfirst($request->name)
        ]);

        return redirect()->route('categories.index')->with('success', 'category updated');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', "Category deleted successfully");
    }
}
