<?php

namespace App\Http\Controllers\Categories;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('categories.index' , compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('categories.index')->with('success' , 'category added successfully');
    }

    public function show(Category $category)
    {
        return view('categories.show' , compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect( )->route('categories.index')->with('success' , 'category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect( )->route('categories.index')->with('success' , 'category Deleted successfully');
    }
}
